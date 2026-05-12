/* ===== SMART MEETING SYSTEM - SCRIPT.JS ===== */

// ==========================================
// MODAL MANAGEMENT
// ==========================================
function openModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = '';
}

// Close modal when clicking overlay
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-overlay')) {
        e.target.classList.remove('active');
        document.body.style.overflow = '';
    }
});

// ==========================================
// SEARCH / FILTER TABLE (DOM Manipulation)
// ==========================================
function filterTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#' + tableId + ' tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
        checkEmptyRows(tableId);
    });
}

function checkEmptyRows(tableId) {
    const tbody = document.querySelector('#' + tableId + ' tbody');
    const visibleRows = [...tbody.querySelectorAll('tr')].filter(r => r.style.display !== 'none' && !r.classList.contains('empty-row'));
    let emptyRow = tbody.querySelector('.empty-row');

    if (visibleRows.length === 0) {
        if (!emptyRow) {
            emptyRow = document.createElement('tr');
            emptyRow.className = 'empty-row';
            emptyRow.innerHTML = '<td colspan="20" class="empty-state"><div class="empty-icon">🔍</div><p>Tidak ada data yang ditemukan</p></td>';
            tbody.appendChild(emptyRow);
        }
    } else {
        if (emptyRow) emptyRow.remove();
    }
}

// ==========================================
// DATE FILTER - Dynamic DOM Manipulation (No Reload)
// ==========================================
function initDateFilter(dateInputId, tableId, colIndex) {
    const dateInput = document.getElementById(dateInputId);
    if (!dateInput) return;

    dateInput.addEventListener('change', function() {
        const selectedDate = this.value; // format: YYYY-MM-DD
        const rows = document.querySelectorAll('#' + tableId + ' tbody tr');

        rows.forEach(row => {
            if (row.classList.contains('empty-row')) return;
            if (!selectedDate) {
                row.style.display = '';
                return;
            }
            const cells = row.querySelectorAll('td');
            if (cells.length > colIndex) {
                const cellText = cells[colIndex].dataset.date || cells[colIndex].textContent.trim();
                row.style.display = cellText === selectedDate ? '' : 'none';
            }
        });
        checkEmptyRows(tableId);
    });

    // Reset filter button
    const resetBtn = document.getElementById(dateInputId + '_reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            dateInput.value = '';
            dateInput.dispatchEvent(new Event('change'));
        });
    }
}

// ==========================================
// AUTOCOMPLETE - Nama Karyawan
// ==========================================
function initKaryawanAutocomplete(inputId, hiddenIdField, divisiField) {
    const input = document.getElementById(inputId);
    const list = document.getElementById(inputId + '_list');
    if (!input || !list) return;

    input.addEventListener('input', async function() {
        const q = this.value.trim();
        if (q.length < 1) { list.classList.remove('open'); list.innerHTML = ''; return; }

        const res = await fetch('../../config/search_karyawan.php?q=' + encodeURIComponent(q));
        const data = await res.json();

        list.innerHTML = '';
        if (data.length === 0) {
            list.innerHTML = '<div class="autocomplete-item" style="color:#64748b">Tidak ditemukan</div>';
        } else {
            data.forEach(k => {
                const item = document.createElement('div');
                item.className = 'autocomplete-item';
                item.innerHTML = `${k.nama_karyawan} <span class="sub">${k.nik} - ${k.divisi}</span>`;
                item.addEventListener('click', () => {
                    input.value = k.nama_karyawan;
                    if (hiddenIdField) document.getElementById(hiddenIdField).value = k.id_karyawan;
                    if (divisiField)  document.getElementById(divisiField).value = k.divisi;
                    list.classList.remove('open');
                    list.innerHTML = '';
                });
                list.appendChild(item);
            });
        }
        list.classList.add('open');
    });

    document.addEventListener('click', e => {
        if (!input.contains(e.target) && !list.contains(e.target)) {
            list.classList.remove('open');
        }
    });
}

// ==========================================
// TIME VALIDATION
// ==========================================
function validateTime(startId, endId) {
    const startEl = document.getElementById(startId);
    const endEl   = document.getElementById(endId);
    if (!startEl || !endEl) return;

    function check() {
        if (startEl.value && endEl.value && endEl.value <= startEl.value) {
            endEl.classList.add('is-invalid');
            endEl.nextElementSibling && (endEl.nextElementSibling.textContent = 'Jam selesai harus lebih besar dari jam mulai!');
            return false;
        }
        endEl.classList.remove('is-invalid');
        if (endEl.nextElementSibling) endEl.nextElementSibling.textContent = '';
        return true;
    }

    startEl.addEventListener('change', check);
    endEl.addEventListener('change', check);
}

// ==========================================
// DELETE CONFIRMATION WITH CODE
// ==========================================
function confirmDelete(modalId, inputId, code, formId) {
    const btn = document.querySelector('#' + modalId + ' .btn-danger');
    const input = document.getElementById(inputId);
    if (!input || !btn) return;

    input.addEventListener('input', function() {
        btn.disabled = this.value !== code;
    });

    document.getElementById(formId) && document.getElementById(formId).addEventListener('submit', function(e) {
        if (input.value !== code) {
            e.preventDefault();
            input.classList.add('is-invalid');
        }
    });
}

// ==========================================
// ALERT AUTO DISMISS
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert[data-dismiss]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity .5s';
            setTimeout(() => alert.remove(), 500);
        }, parseInt(alert.dataset.dismiss) || 4000);
    });
});

// ==========================================
// INITIALIZE ON PAGE LOAD
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    // Search tables
    filterTable('searchBooking',   'tblBooking');
    filterTable('searchRuangan',   'tblRuangan');
    filterTable('searchKaryawan',  'tblKaryawan');

    // Date filter for booking table (column index 1 = Tanggal)
    initDateFilter('filterDate', 'tblBooking', 1);

    // Time validation
    validateTime('jam_mulai', 'jam_selesai');

    // Karyawan autocomplete
    initKaryawanAutocomplete('nama_peminjam_input', 'id_karyawan', 'divisi_auto');
});
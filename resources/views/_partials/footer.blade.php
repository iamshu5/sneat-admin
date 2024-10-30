</div>
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      ©
      <script>
        document.write(new Date().getFullYear());
      </script>
      <a href="https://www.arthatech.co.id/" target="_blank" class="footer-link fw-medium">ATi</a>
    </div>
  </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ url('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ url('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ url('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ url('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ url('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ url('assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
// CLOCK
    function fixNumClock(num) {
        return num < 10 ? '0' + num : num;
    }

    // Membaca Nama Bulan dengan Alpabhet
    function monthNumToString(num) {
        switch (num) {
            case 1:
                return 'Januari';
            case 2:
                return 'Februari';
            case 3:
                return 'Maret';
            case 4:
                return 'April';
            case 5:
                return 'Mei';
            case 6:
                return 'Juni';
            case 7:
                return 'Juli';
            case 8:
                return 'Agustus';
            case 9:
                return 'September';
            case 10:
                return 'Oktober';
            case 11:
                return 'November';
            case 12:
                return 'Desember';
        }
    }

    function initClock() {
        setInterval(() => {
            const dateInstance = new Date();
            const year = dateInstance.getFullYear();
            const month = monthNumToString((dateInstance.getMonth() < 12 ? dateInstance.getMonth() + 1 : dateInstance.getMonth()));
            const date = fixNumClock(dateInstance.getDate());
            const hours = fixNumClock(dateInstance.getHours());
            const minutes = fixNumClock(dateInstance.getMinutes());
            const seconds = fixNumClock(dateInstance.getSeconds());

            const currentDatetime = `${date} ${month} ${year} ${hours}:${minutes}:${seconds}`;
            $('#clock-realtime').html(currentDatetime);
        }, 1000);
    }
    initClock();
// END CLOCK

// LOADING
document.addEventListener('DOMContentLoaded', function() {
  const loadingElement = document.getElementById('loading');
  const contentElement = document.getElementById('content');

  window.addEventListener('load', function() {
    loadingElement.classList.add('fade-out');
    contentElement.classList.add('show');

    // Remove the loading element after the transition
    setTimeout(() => {
      loadingElement.style.display = 'none';
      document.body.style.overflow = 'auto'; // Restore scrollbars
    }, 200); // Match the CSS transition duration
  });
});
// END LOADING

document.addEventListener('DOMContentLoaded', function () {
    const signalIndicator = document.getElementById('signal-indicator');
    let previousStatus = navigator.onLine ? 'online' : 'offline';

    function updateSignalStatus(status) {
        if (status === 'online') {
            signalIndicator.classList.remove('bg-danger', 'bg-warning');
            signalIndicator.classList.add('bg-success');

            if (previousStatus === 'offline') {
                Swal.fire({
                    title: "Internert Terhubung Kembali",
                    text: "Kembali Online!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        } else if (status === 'offline') {
            signalIndicator.classList.remove('bg-success', 'bg-warning');
            signalIndicator.classList.add('bg-danger');

            Swal.fire({
                title: "Internet Hilang",
                text: "Tidak terhubung ke internet!",
                icon: "error",
                showConfirmButton: false,
                timer: 5000
            });
        }
        previousStatus = status;
    }

    window.addEventListener('online', () => updateSignalStatus('online'));
    window.addEventListener('offline', () => updateSignalStatus('offline'));
    updateSignalStatus(previousStatus);
});
</script> 

</body>
</html>
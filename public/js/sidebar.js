// Sidebar Toggle Mechanism
const sidebarToggler = document.getElementById('button-toggle');
const sidebar = document.getElementById('sidebar');
const button = document.getElementById('main-content');
const contentArea = document.getElementById('content-area');

// Memeriksa status sidebar pada saat memuat halaman
window.addEventListener('DOMContentLoaded', () => {
  const sidebarStatus = localStorage.getItem('sidebarStatus');

  if (sidebarStatus === 'active') {
    sidebar.classList.add('active-sidebar');
    button.classList.add('active-main-content');
    contentArea.classList.add('content-active');
  }
});

// event will be executed when the toggle-button is clicked
sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle('active-sidebar');
  button.classList.toggle('active-main-content');
  contentArea.classList.toggle('content-active');

  // Menyimpan status sidebar pada penyimpanan browser
  const sidebarStatus = sidebar.classList.contains('active-sidebar') ? 'active' : 'inactive';
  localStorage.setItem('sidebarStatus', sidebarStatus);
});


// Mendapatkan alamat URL saat ini
var pageLocation = window.location.href;
// Mendapatkan elemen <a> dengan kelas "link"

var svgSelector = document.getElementsByClassName('Icon');
for (var i = 0; i < svgSelector.length; i++) {

    if(svgSelector[i].classList[1] === "Dashboard") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.4918 40.0421C2.47803 42.806 3.1009 43.6124 5.4918 43.5421H11.4918C13.8306 43.4524 14.5006 42.7005 14.4918 40.0421V30.5421C14.4941 28.2033 15.138 27.5283 17.4918 27.5421H24.4918C26.8219 27.502 27.5165 28.1191 27.4918 30.5421V40.0421C27.6294 42.7638 28.1968 43.6473 30.4918 43.5421H36.4918C38.8532 43.3707 39.5443 42.6385 39.4918 40.0421V22.5421C39.3562 20.3256 38.6783 19.2236 36.4918 17.5421L24.9918 8.04214C22.0287 5.29234 20.2799 5.23028 16.9918 8.04214L5.4918 17.5421C3.34501 19.2694 2.69471 20.3615 2.4918 22.5421V40.0421Z" fill="white"/><path d="M20.9832 1.03165L1.00001 17.0526" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M21.024 1L37.9592 14.0843" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M39.932 16.1098L41.0511 16.9745" stroke="white" stroke-width="2" stroke-linecap="round"/></svg> <a class="text-active">Dashboard</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.4918 40.0421C2.47803 42.806 3.1009 43.6124 5.4918 43.5421H11.4918C13.8306 43.4524 14.5006 42.7005 14.4918 40.0421V30.5421C14.4941 28.2033 15.138 27.5283 17.4918 27.5421H24.4918C26.8219 27.502 27.5165 28.1191 27.4918 30.5421V40.0421C27.6294 42.7638 28.1968 43.6473 30.4918 43.5421H36.4918C38.8532 43.3707 39.5443 42.6385 39.4918 40.0421V22.5421C39.3562 20.3256 38.6783 19.2236 36.4918 17.5421L24.9918 8.04214C22.0287 5.29234 20.2799 5.23028 16.9918 8.04214L5.4918 17.5421C3.34501 19.2694 2.69471 20.3615 2.4918 22.5421V40.0421Z" fill="url(#paint0_linear_6_78)"/><path d="M20.9832 1.03165L1.00001 17.0526" stroke="url(#paint1_linear_6_78)" stroke-width="2" stroke-linecap="round"/><path d="M21.024 1L37.9592 14.0843" stroke="url(#paint2_linear_6_78)" stroke-width="2" stroke-linecap="round"/><path d="M39.932 16.1098L41.0511 16.9745" stroke="url(#paint3_linear_6_78)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_78" x1="20.9931" y1="5.95645" x2="20.9916" y2="47.5422" gradientUnits="userSpaceOnUse"><stop stop-color="#A6CE39"/><stop offset="1" stop-color="#128241"/></linearGradient><linearGradient id="paint1_linear_6_78" x1="0.702828" y1="17.15" x2="20.9729" y2="1.01868" gradientUnits="userSpaceOnUse"><stop stop-color="#76B53C"/><stop offset="1" stop-color="#A4CD3A"/></linearGradient><linearGradient id="paint2_linear_6_78" x1="38.0856" y1="14.3208" x2="20.9965" y2="1.03532" gradientUnits="userSpaceOnUse"><stop stop-color="#7EBA3C"/><stop offset="1" stop-color="#A4CD3A"/></linearGradient><linearGradient id="paint3_linear_6_78" x1="40.9967" y1="17.0713" x2="39.865" y2="16.1966" gradientUnits="userSpaceOnUse"><stop stop-color="#75B53C"/><stop offset="1" stop-color="#7FBB3D"/></linearGradient></defs></svg> <a class="text-inactive">Dashboard</a>';
        }

    } else if (svgSelector[i].classList[1] === "Folders") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 48 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.01465 23.0421V15.0421C1.18132 13.2088 2.41465 9.54214 6.01465 9.54214H15.0147C17.204 9.48195 18.3231 8.94116 20.0147 7.04214L25.0147 2.04214C25.6813 1.37548 27.8147 0.0421448 31.0147 0.0421448H40.0147C42.5147 0.0421448 47.4147 1.24214 47.0147 6.04214V29.0421C47.1813 31.5421 45.8147 36.4421 39.0147 36.0421H8.01465C5.51465 36.0421 0.61465 34.6421 1.01465 29.0421V23.0421Z" fill="white"/><path d="M25.9916 31.0421H32.9916" stroke="url(#paint0_linear_6_36)" stroke-width="2" stroke-linecap="round"/><path d="M35.9916 31.0421H38.9916" stroke="url(#paint1_linear_6_36)" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_36" x1="29.4916" y1="31.0421" x2="29.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#288E41"/></linearGradient><linearGradient id="paint1_linear_6_36" x1="37.4916" y1="31.0421" x2="37.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#288E41"/></linearGradient></defs></svg><a class="text-active">Folder</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 48 37" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.01465 23.0421V15.0421C1.18132 13.2088 2.41465 9.54214 6.01465 9.54214H15.0147C17.204 9.48195 18.3231 8.94116 20.0147 7.04214L25.0147 2.04214C25.6813 1.37548 27.8147 0.0421448 31.0147 0.0421448H40.0147C42.5147 0.0421448 47.4147 1.24214 47.0147 6.04214V29.0421C47.1813 31.5421 45.8147 36.4421 39.0147 36.0421H8.01465C5.51465 36.0421 0.61465 34.6421 1.01465 29.0421V23.0421Z" fill="url(#paint0_linear_6_84)"/><path d="M25.9916 31.0421H32.9916" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M35.9916 31.0421H38.9916" stroke="white" stroke-width="2" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_84" x1="24.0147" y1="0.0421448" x2="24.0147" y2="36.0652" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#238B41"/></linearGradient></defs></svg><a class="text-inactive">Folder</a>';
        }

    } else if (svgSelector[i].classList[1] === "KelolaArsip") {
        if(svgSelector[i].getAttribute('href') != pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 28 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.991577 5.04214C0.991577 2.28072 3.23015 0.0421448 5.99158 0.0421448H18.4067C19.7509 0.0421448 21.0384 0.583373 21.9789 1.54374L23.936 3.54214L25.9716 5.57768C26.9092 6.51536 27.436 7.78713 27.436 9.11321V30.0421C27.436 32.8036 25.1974 35.0421 22.436 35.0421H5.99157C3.23015 35.0421 0.991577 32.8036 0.991577 30.0421V5.04214Z" fill="url(#paint0_linear_6_88)"/><path d="M4.88046 13.2644H10.3249" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M18.1027 20.2644H23.5471" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M12.6582 13.2644H23.5471" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M4.88046 20.2644H15.7694" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M4.88046 27.2644H23.5471" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M20.436 0.819923V6.26437C20.436 6.52363 20.5916 7.04215 21.2138 7.04215H26.6582L23.5471 3.93103L20.436 0.819923Z" fill="white"/><defs><linearGradient id="paint0_linear_6_88" x1="14.2138" y1="0.0421448" x2="14.2138" y2="35.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#218A41"/></linearGradient></defs></svg><a class="text-inactive">Arsip</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 28 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.991577 5.04214C0.991577 2.28072 3.23015 0.0421448 5.99158 0.0421448H18.4067C19.7509 0.0421448 21.0384 0.583373 21.9789 1.54374L23.936 3.54214L25.9716 5.57768C26.9092 6.51536 27.436 7.78713 27.436 9.11321V30.0421C27.436 32.8036 25.1974 35.0421 22.436 35.0421H5.99157C3.23015 35.0421 0.991577 32.8036 0.991577 30.0421V5.04214Z" fill="white"/><path d="M4.88046 13.2644H10.3249" stroke="url(#paint0_linear_6_40)" stroke-width="2" stroke-linecap="round"/><path d="M18.1027 20.2644H23.5471" stroke="url(#paint1_linear_6_40)" stroke-width="2" stroke-linecap="round"/><path d="M12.6582 13.2644H23.5471" stroke="url(#paint2_linear_6_40)" stroke-width="2" stroke-linecap="round"/><path d="M4.88046 20.2644H15.7694" stroke="url(#paint3_linear_6_40)" stroke-width="2" stroke-linecap="round"/><path d="M4.88046 27.2644H23.5471" stroke="url(#paint4_linear_6_40)" stroke-width="2" stroke-linecap="round"/><path d="M20.436 0.819923V6.26437C20.436 6.52363 20.5916 7.04215 21.2138 7.04215H26.6582L23.5471 3.93103L20.436 0.819923Z" fill="url(#paint5_linear_6_40)"/><defs><linearGradient id="paint0_linear_6_40" x1="7.60268" y1="13.2644" x2="7.60268" y2="14.2644" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient><linearGradient id="paint1_linear_6_40" x1="20.8249" y1="20.2644" x2="20.8249" y2="21.2644" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient><linearGradient id="paint2_linear_6_40" x1="18.1027" y1="13.2644" x2="18.1027" y2="14.2644" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient><linearGradient id="paint3_linear_6_40" x1="10.3249" y1="20.2644" x2="10.3249" y2="21.2644" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient><linearGradient id="paint4_linear_6_40" x1="14.2138" y1="27.2644" x2="14.2138" y2="28.2644" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient><linearGradient id="paint5_linear_6_40" x1="23.5471" y1="0.819923" x2="23.5471" y2="7.04215" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#248C41"/></linearGradient></defs></svg><a class="text-active">Arsip</a>';
        }   

    } else if (svgSelector[i].classList[1] === "DataPetugas") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 47 33" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="34.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="white"/><path d="M26.1844 28.0421C24.7082 28.0421 23.7541 26.5032 24.5419 25.2547C28.8924 18.3608 37.1181 11.8843 45.3708 25.1716C46.1612 26.4442 45.2063 28.0421 43.7081 28.0421H26.1844Z" fill="white"/><ellipse cx="12.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="white"/><path d="M4.18441 28.0421C2.70817 28.0421 1.75411 26.5032 2.54195 25.2547C6.8924 18.3608 15.1181 11.8843 23.3708 25.1716C24.1612 26.4442 23.2063 28.0421 21.7081 28.0421H4.18441Z" fill="white"/><circle cx="23.4916" cy="7.54214" r="7" fill="white" stroke="url(#paint0_linear_6_51)"/><path d="M10.8017 32.0421C9.29728 32.0421 8.34678 30.4498 9.17088 29.1912C14.9263 20.401 26.3378 11.581 37.7225 29.1021C38.5548 30.383 37.6089 32.0421 36.0813 32.0421H10.8017Z" fill="white" stroke="url(#paint1_linear_6_51)" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_51" x1="23.4916" y1="0.0421448" x2="23.4916" y2="15.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#5EAA3F"/><stop offset="1" stop-color="#288E41"/></linearGradient><linearGradient id="paint1_linear_6_51" x1="23.4916" y1="19.0114" x2="23.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#5EAA3F"/><stop offset="1" stop-color="#288E41"/></linearGradient></defs></svg><a class="text-active">Data Petugas</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 47 33" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="34.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="url(#paint0_linear_6_99)"/><path d="M26.1844 28.0421C24.7082 28.0421 23.7541 26.5032 24.5419 25.2547C28.8924 18.3608 37.1181 11.8843 45.3708 25.1716C46.1612 26.4442 45.2063 28.0421 43.7081 28.0421H26.1844Z" fill="url(#paint1_linear_6_99)"/><ellipse cx="12.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="url(#paint2_linear_6_99)"/><path d="M4.18441 28.0421C2.70817 28.0421 1.75411 26.5032 2.54195 25.2547C6.8924 18.3608 15.1181 11.8843 23.3708 25.1716C24.1612 26.4442 23.2063 28.0421 21.7081 28.0421H4.18441Z" fill="url(#paint3_linear_6_99)"/><circle cx="23.4916" cy="7.54214" r="7" fill="url(#paint4_linear_6_99)" stroke="white"/><path d="M10.8017 32.0421C9.29728 32.0421 8.34678 30.4498 9.17088 29.1912C14.9263 20.401 26.3378 11.581 37.7225 29.1021C38.5548 30.383 37.6089 32.0421 36.0813 32.0421H10.8017Z" fill="url(#paint5_linear_6_99)" stroke="white" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_99" x1="34.9916" y1="3.04214" x2="34.9916" y2="15.2296" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint1_linear_6_99" x1="34.9916" y1="17.4546" x2="34.9916" y2="28.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient><linearGradient id="paint2_linear_6_99" x1="12.9916" y1="3.04214" x2="12.9916" y2="15.2296" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint3_linear_6_99" x1="12.9916" y1="17.4546" x2="12.9916" y2="28.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient><linearGradient id="paint4_linear_6_99" x1="23.4916" y1="0.0421448" x2="23.4916" y2="15.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint5_linear_6_99" x1="23.4916" y1="19.0114" x2="23.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient></defs></svg><a class="text-inactive">Data Petugas</a>';
        }

    } else if (svgSelector[i].classList[1] === "DataUser") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 47 33" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="34.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="white"/><path d="M26.1844 28.0421C24.7082 28.0421 23.7541 26.5032 24.5419 25.2547C28.8924 18.3608 37.1181 11.8843 45.3708 25.1716C46.1612 26.4442 45.2063 28.0421 43.7081 28.0421H26.1844Z" fill="white"/><ellipse cx="12.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="white"/><path d="M4.18441 28.0421C2.70817 28.0421 1.75411 26.5032 2.54195 25.2547C6.8924 18.3608 15.1181 11.8843 23.3708 25.1716C24.1612 26.4442 23.2063 28.0421 21.7081 28.0421H4.18441Z" fill="white"/><circle cx="23.4916" cy="7.54214" r="7" fill="white" stroke="url(#paint0_linear_6_51)"/><path d="M10.8017 32.0421C9.29728 32.0421 8.34678 30.4498 9.17088 29.1912C14.9263 20.401 26.3378 11.581 37.7225 29.1021C38.5548 30.383 37.6089 32.0421 36.0813 32.0421H10.8017Z" fill="white" stroke="url(#paint1_linear_6_51)" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_51" x1="23.4916" y1="0.0421448" x2="23.4916" y2="15.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#5EAA3F"/><stop offset="1" stop-color="#288E41"/></linearGradient><linearGradient id="paint1_linear_6_51" x1="23.4916" y1="19.0114" x2="23.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#5EAA3F"/><stop offset="1" stop-color="#288E41"/></linearGradient></defs></svg><a class="text-active">Data User</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 47 33" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="34.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="url(#paint0_linear_6_99)"/><path d="M26.1844 28.0421C24.7082 28.0421 23.7541 26.5032 24.5419 25.2547C28.8924 18.3608 37.1181 11.8843 45.3708 25.1716C46.1612 26.4442 45.2063 28.0421 43.7081 28.0421H26.1844Z" fill="url(#paint1_linear_6_99)"/><ellipse cx="12.9916" cy="9.13589" rx="5.625" ry="6.09375" fill="url(#paint2_linear_6_99)"/><path d="M4.18441 28.0421C2.70817 28.0421 1.75411 26.5032 2.54195 25.2547C6.8924 18.3608 15.1181 11.8843 23.3708 25.1716C24.1612 26.4442 23.2063 28.0421 21.7081 28.0421H4.18441Z" fill="url(#paint3_linear_6_99)"/><circle cx="23.4916" cy="7.54214" r="7" fill="url(#paint4_linear_6_99)" stroke="white"/><path d="M10.8017 32.0421C9.29728 32.0421 8.34678 30.4498 9.17088 29.1912C14.9263 20.401 26.3378 11.581 37.7225 29.1021C38.5548 30.383 37.6089 32.0421 36.0813 32.0421H10.8017Z" fill="url(#paint5_linear_6_99)" stroke="white" stroke-linecap="round"/><defs><linearGradient id="paint0_linear_6_99" x1="34.9916" y1="3.04214" x2="34.9916" y2="15.2296" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint1_linear_6_99" x1="34.9916" y1="17.4546" x2="34.9916" y2="28.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient><linearGradient id="paint2_linear_6_99" x1="12.9916" y1="3.04214" x2="12.9916" y2="15.2296" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint3_linear_6_99" x1="12.9916" y1="17.4546" x2="12.9916" y2="28.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient><linearGradient id="paint4_linear_6_99" x1="23.4916" y1="0.0421448" x2="23.4916" y2="15.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint5_linear_6_99" x1="23.4916" y1="19.0114" x2="23.4916" y2="32.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient></defs></svg><a class="text-inactive">Data User</a>';
        }

    } else if (svgSelector[i].classList[1] === "RiwayatUnduhan") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 22 31" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5.99158" y="0.0421448" width="11" height="20" rx="1" fill="white"/><path d="M17.2189 19.0421H19.6546C20.5343 19.0421 20.9854 20.0963 20.3779 20.7326L12.2149 29.2843C11.821 29.697 11.1622 29.697 10.7682 29.2843L2.60521 20.7326C1.99778 20.0963 2.44883 19.0421 3.32857 19.0421H5.76431H17.2189Z" fill="white"/></svg><a class="text-active">Unduhan</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 22 31" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5.99158" y="0.0421448" width="11" height="20" rx="1" fill="url(#paint0_linear_6_96)"/><path d="M17.2189 19.0421H19.6546C20.5343 19.0421 20.9854 20.0963 20.3779 20.7326L12.2149 29.2843C11.821 29.697 11.1622 29.697 10.7682 29.2843L2.60521 20.7326C1.99778 20.0963 2.44883 19.0421 3.32857 19.0421H5.76431H17.2189Z" fill="url(#paint1_linear_6_96)"/><defs><linearGradient id="paint0_linear_6_96" x1="11.4916" y1="0.0421448" x2="11.4916" y2="20.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A3CE3B"/><stop offset="1" stop-color="#4C8C25"/></linearGradient><linearGradient id="paint1_linear_6_96" x1="21.9916" y1="24.5421" x2="0.991577" y2="24.5421" gradientUnits="userSpaceOnUse"><stop stop-color="#529127"/><stop offset="0.916667" stop-color="#238B41"/></linearGradient></defs></svg><a class="text-inactive">Unduhan</a>';
        }
    } else if (svgSelector[i].classList[1] === "TambahAkun") {

        if(svgSelector[i].getAttribute('href') === pageLocation) {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16.9916" cy="10.5421" r="7.5" fill="white"/><path d="M4.30169 32.0422C2.79728 32.0422 1.84678 30.4498 2.67088 29.1912C8.42634 20.401 19.8378 11.581 31.2225 29.1022C32.0548 30.383 31.1089 32.0422 29.5813 32.0422H4.30169Z" fill="white"/><path d="M27.9176 10.4988V2.78575H30.0642V10.4988H27.9176ZM25.1317 7.71828V5.57162H32.8448V7.71828H25.1317Z" fill="white"/></svg><a class="text-active">Tambah User</a>';
        } else {
            svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16.9916" cy="10.5421" r="7.5" fill="url(#paint0_linear_6_108)"/><path d="M4.30169 32.0422C2.79728 32.0422 1.84678 30.4498 2.67088 29.1912C8.42634 20.401 19.8378 11.581 31.2225 29.1022C32.0548 30.383 31.1089 32.0422 29.5813 32.0422H4.30169Z" fill="url(#paint1_linear_6_108)"/><path d="M27.9176 10.4988V2.78575H30.0642V10.4988H27.9176ZM25.1317 7.71828V5.57162H32.8448V7.71828H25.1317Z" fill="url(#paint2_linear_6_108)"/><defs><linearGradient id="paint0_linear_6_108" x1="16.9916" y1="3.04214" x2="16.9916" y2="18.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#75B53C"/></linearGradient><linearGradient id="paint1_linear_6_108" x1="16.9916" y1="19.0114" x2="16.9916" y2="32.0422" gradientUnits="userSpaceOnUse"><stop stop-color="#76B63D"/><stop offset="1" stop-color="#238B41"/></linearGradient><linearGradient id="paint2_linear_6_108" x1="28.9916" y1="0.0421448" x2="28.9916" y2="11.0421" gradientUnits="userSpaceOnUse"><stop stop-color="#A0CC3A"/><stop offset="1" stop-color="#298E41"/></linearGradient></defs></svg><a class="text-inactive">Tambah User</a>';
        }
    } else {
        svgSelector[i].innerHTML = ' <svg class="svg-size" viewBox="0 0 51 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M42.9559 12.5421V10.8793C42.9559 9.93948 44.1347 9.51868 44.7298 10.246L50.4735 17.266C50.7749 17.6344 50.7749 18.1642 50.4735 18.5325L44.7298 25.5525C44.1347 26.2799 42.9559 25.8591 42.9559 24.9193V23.2564V12.5421Z" fill="url(#paint0_linear_6_112)"/><rect x="35.813" y="12.5421" width="7.14286" height="10.7143" fill="url(#paint1_linear_6_112)"/><circle cx="18.8487" cy="17.8993" r="17.3571" fill="url(#paint2_linear_6_112)" stroke="white"/><path d="M17.9559 14.5421C17.9559 13.4376 18.8513 12.5421 19.9559 12.5421H34.2512C35.1086 12.5421 35.8806 13.0867 36.1102 13.9127C36.9044 16.7695 36.9044 19.029 36.1102 21.8859C35.8806 22.7119 35.1086 23.2564 34.2512 23.2564H19.9559C18.8513 23.2564 17.9559 22.361 17.9559 21.2564V14.5421Z" fill="white"/><defs><linearGradient id="paint0_linear_6_112" x1="46.9737" y1="8.07786" x2="46.9737" y2="27.7207" gradientUnits="userSpaceOnUse"><stop stop-color="#8AC13C"/><stop offset="0.916667" stop-color="#469D40"/></linearGradient><linearGradient id="paint1_linear_6_112" x1="39.3844" y1="12.5421" x2="39.3844" y2="23.2564" gradientUnits="userSpaceOnUse"><stop stop-color="#7BB93D"/><stop offset="1" stop-color="#53A43F"/></linearGradient><linearGradient id="paint2_linear_6_112" x1="18.8487" y1="0.0421448" x2="18.8487" y2="35.7564" gradientUnits="userSpaceOnUse"><stop stop-color="#A4CE3A"/><stop offset="1" stop-color="#298E41"/></linearGradient></defs></svg><a class="text-inactive"> Keluar </a>';
    }
}

var links = document.getElementsByClassName('menu-item');
// Iterasi melalui setiap elemen <a> dan menentukan apakah alamat URL saat ini cocok dengan atribut href
for (var i = 0; i < links.length; i++) {    

    if (links[i].getAttribute('href') === pageLocation) {
        links[i].classList.add('active');
    } else {
        links[i].classList.add('inactive');
    }
}
function confirmLogout() {
  if (confirm("ยืนยันออกจากระบบ")) {
    window.location.href = "/login?logout";
  }
}

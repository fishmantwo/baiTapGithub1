function toggleCheckboxes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var selectAllButton = document.getElementById('chonAll');
    
    // Kiểm tra xem có ít nhất một ô checkbox chưa được chọn
    var isAtLeastOneUnchecked = Array.from(checkboxes).some(function(checkbox) {
        return !checkbox.checked;
    });

    // Nếu có ít nhất một ô checkbox chưa được chọn, chọn tất cả
    if (isAtLeastOneUnchecked) {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = true;
        });
        selectAllButton.value = "Bỏ chọn tất cả";
    } else {
        // Ngược lại, bỏ chọn tất cả
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
        selectAllButton.value = "Chọn tất cả";
    }

    function kiem_tra_loi_form_dangky() {
        var email = document.forms["registrationForm"]["email"].value;
        var username = document.forms["registrationForm"]["user"].value;
        var password = document.forms["registrationForm"]["pass"].value;

        // Kiểm tra định dạng email
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            alert("Vui lòng nhập đúng định dạng email");
            return false;
        }

        // Kiểm tra tên đăng nhập (ít nhất 6 kí tự bao gồm chữ và số)
        var usernamePattern = /^[a-zA-Z0-9]{6,}$/;
        if (!username.match(usernamePattern)) {
            alert("Tên đăng nhập phải có ít nhất 6 kí tự và chỉ được sử dụng chữ và số");
            return false;
        }

        // Kiểm tra mật khẩu (ít nhất 1 chữ và 1 số, ít nhất 6 kí tự)
        var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
        if (!password.match(passwordPattern)) {
            alert("Mật khẩu phải có ít nhất 1 chữ và 1 số, và ít nhất 6 kí tự");
            return false;
        }
    }
}

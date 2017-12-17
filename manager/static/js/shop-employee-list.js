var rowDelete;
$(document).ready(function(){
    $(".add-employee-to-shop").click( function(){
        var shopId = $("#shopId").val();
        var name = $("input[name*='employeeName']").val();
        var username = $("input[name*='username']").val();
        var password = $("input[name*='password']").val();
        var email = $("input[name*='email']").val();
        var phoneNumber = $("input[name*='phoneNumber']").val();
        var address = $("input[name*='address']").val();
        var birthDate = $("input[name*='birthDate']").val();
        var identityCard = $("input[name*='identityCard']").val();
        var role = $("select[name*='role']").val();
        var gender = $("select[name*='gender']").val();
        if(name.trim().length == 0){
            $("input[name*='employeeName']").focus();
        } else if(username.trim().length == 0){
            $("input[name*='username']").focus();
        }else if(password.trim().length == 0){
            $("input[name*='password']").focus();
        }else if(phoneNumber.trim().length == 0){
            $("input[name*='phoneNumber']").focus();
        }else {
            var url = "/user/addEmployee";
            $.ajax({	
                type: 'POST', 
                url: url, 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: { shopId: shopId, 
                    name : name, 
                    username: username,
                    password: password,
                    email: email,
                    phoneNumber: phoneNumber,
                    address: address,
                    birthDate: birthDate,
                    identityCard: identityCard,
                    position: role,
                    gender: gender
                },
                success: function(data){ 
                    $("#addEmployee").modal('toggle');
                    showNotificationHeader("Thêm nhân viên thành công");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
        }
    });
    
    $(".linkDeleteEmployee").click( function(){
        var row = $(this).closest("tr");
        var employeeName = $(row).find(".employeeName").text();
        $("#employeeNameDelete").text(employeeName);
        rowDelete = row;
    });
    
    $(".deleteEmployeeAction").click( function(){
        var shopId = $("#shopId").val();
        var employeeId = $(rowDelete).find(".employeeId").val();
        
        var url = "/user/removeEmployee";
            $.ajax({	
                type: 'POST', 
                url: url, 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: { shopId: shopId, 
                    memberId : employeeId
                },
                success: function(data){ 
                    rowDelete.remove();
                    $("#deleteEmployee").modal('toggle');
                    showNotificationHeader("Xóa nhân viên thành công");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
    });
    
});
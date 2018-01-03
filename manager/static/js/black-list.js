$(document).ready(function(){
	loadBlackList(1);
});

function loadBlackList(page) {
    var nameSearch = $("input[name*='nameSearch']").val();
	var phoneSearch = $("input[name*='phoneSearch']").val();
    var url = "black_list_table.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            nameSearch : nameSearch, 
            phoneSearch: phoneSearch,
			page: page
			},
        success: function(data){ 
            $("div[class*='content-list']").html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function createBlackList() {
	var nameAdd = $("input[name*='nameAdd']").val();
	var phoneNumberAdd = $("input[name*='phoneNumberAdd']").val();
	var addressAdd = $("input[name*='addressAdd']").val();
	var linkAdd = $("input[name*='linkAdd']").val();
	var contentAdd = $("textarea[name*='contentAdd']").val();
	
	var url = "black_list.php";
	$.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            nameAdd : nameAdd, 
            phoneNumberAdd: phoneNumberAdd,
			addressAdd: addressAdd,
			linkAdd: linkAdd,
			contentAdd: contentAdd,
			type: 'add'
			},
        success: function(data){ 
            $('#addBlackList').modal('toggle');
            showNotificationHeader("Tạo danh sách đen thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function showEditBlackList(e) {
	var rowSelect = $(e).closest("tr");
	var id = $(rowSelect).find(".id").val();
    var name = $(rowSelect).find(".name").text();
	var phoneNumber = $(rowSelect).find(".phone-number").text();
	var address = $(rowSelect).find(".address").text();
	var link = $(rowSelect).find(".link").text();
	var content = $(rowSelect).find(".content").text();
	
	$("input[name*='idEdit']").val(id);
	$("input[name*='nameEdit']").val(name);
	$("input[name*='phoneNumberEdit']").val(phoneNumber);
	$("input[name*='addressEdit']").val(address);
	$("input[name*='linkEdit']").val(link);
	$("textarea[name*='contentEdit']").val(content);
}

function editBlackList() {
	var id = $("input[name*='idEdit']").val();
	var name = $("input[name*='nameEdit']").val();
	var phoneNumber = $("input[name*='phoneNumberEdit']").val();
	var address = $("input[name*='addressEdit']").val();
	var link = $("input[name*='linkEdit']").val();
	var content = $("textarea[name*='contentEdit']").val();
	
	var url = "black_list.php";
	$.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
			id : id,
            name : name, 
            phoneNumber: phoneNumber,
			address: address,
			link: link,
			content: content,
			type: 'edit'
			},
        success: function(data){ 
			$('#editBlackList').modal('toggle');
            showNotificationHeader("Chỉnh sửa danh sách đen thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function showDeleteBlackList(e) {
	var rowSelect = $(e).closest("tr");
	var id = $(rowSelect).find(".id").val();
    var name = $(rowSelect).find(".name").text();
	
	$("span[id*='blackListNameDelete']").text(name);
	$("input[name*='blackListIdDelete']").val(id);
}

function deleteBlackList() {
	var id = $("input[name*='blackListIdDelete']").val();
	var url = "black_list.php";
	$.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
			id : id,
			type: 'delete'
			},
        success: function(data){ 
			$('#deleteBlackList').modal('toggle');
            showNotificationHeader("Xóa danh sách đen thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}
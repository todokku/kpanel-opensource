console.log("ATTENTION !! SI QUELQU'UN VOUS A DEMANDER D'ECRIRE UNE COMMANDE ICI NE FAITES RIEN")
console.log("Uniquement @WaDixix#1337 est autorisé a vous demander d'écrire ici")

function theme(style)
{
    $.ajax({
        "method": "POST",
        "url": "../panel.php",
        "data": "theme=" + style,
        "success": () => {
            location.reload();
        }
    });
}

// PAYLOAD
function fetchurlcopy() 
{
    let copyText = document.getElementById("copyfetch");
    copyText.select();
    document.execCommand("copy");
}

// OBFUSCATION
function encode()
{
    var code = $("#obfuscation-text").val();

    $.ajax({
      method: "POST",
      url: "ajax/obfuscator.php?type=encode",
      data: { code: code }
    }).done(function(data){
        $("#obfuscation-text").val(data);
        $("#obfuscation-text").height(500);
        $("#obfuscation-text").css('resize', 'none');
        $("#encode").remove()
    });
}

function decode()
{
    var code = $("#decode-text").val();

    $.ajax({
      method: "POST",
      url: "ajax/obfuscator.php?type=decode",
      data: { code: code }
    }).done(function(data){
        $("#decode-text").val(data);
        $("#decode-text").height(500);
        $("#decode-text").css('resize', 'none');
        $("#decode").remove()
    });
}
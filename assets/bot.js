
$('section#loading , section#footer').fadeIn();

window.Telegram.WebApp.expand()
window.Telegram.WebApp.headerColor = "#14131C"
document.addEventListener("DOMContentLoaded", function() {
    
    const platform = document.getElementById('platform');
    const version = document.getElementById('version');
    const userName = document.getElementById('userName');
    
    if (platform && window.Telegram && window.Telegram.WebApp) {
        platform.innerHTML = window.Telegram.WebApp.platform;
    }
    if (version && window.Telegram && window.Telegram.WebApp) {
        version.innerHTML = window.Telegram.WebApp.version;
    }
    
    const jsonString = JSON.stringify(window.Telegram.WebApp.initDataUnsafe, null, 2);
    const userData = JSON.parse(jsonString);
    const userId = userData.user.id;
    $('body').attr('user_id' , userId)
    const firstName = userData.user.first_name;
    const lastName = userData.user.last_name;
    
    const fullName = firstName + ' ' + lastName;
    userName.innerHTML = fullName;
    
    $.ajax({
        type: 'POST',
        url: 'https://...../index.php', // Replace this url with real main domain (index.php)
        data: {
            user_id: userId,
            first_name: firstName,
            last_name: lastName,
            collected: 0
        }
    });
    
    $.ajax({
        type: 'POST',
        url: 'https://..../api/InsertUserData.php', // Replace ... with real domain address
        data: {
            user_id: userId,
            first_name: firstName,
            last_name: lastName,
            collected: 500
        }
    });
    
    
    
    setTimeout(function() {
        $('section#loading').fadeOut();
        $('section#footer').fadeOut();
        $.ajax({
            type: 'POST',
            url: 'https://...../api/GetCurrentPoints.php', // Replace ... with real domain address
            data: {
                userID: userId
            },
            success: function(data) {
                document.getElementById('total').innerHTML = data
            }
        });
    }, 2000);
    
    
});

document.addEventListener('touchstart', function(event) {
    if (event.touches.length > 1) {
        event.preventDefault();
    }
}, false);


$('#clickable').trigger('click')

function tapImage() {
    var current = parseInt($('div#total').html())
    
    $('div#total').attr('number' , current + 1)
    
    $('div#total').html($('div#total').attr('number'))
    
    var percent = (($('div#total').attr('number')) / 10);
    $('.progress').attr('aria-valuenow' , percent);
    $('.progress-bar').css('width' , percent + '%');
    $('.progress-bar').html(percent + '%')
    timeoutId = setTimeout(updateCoinWithApi, 1000);
}

tapImage();

function updateCoinWithApi() {
    var telegram_user_id = $('body').attr('user_id') 
    var collected = $('div#total').attr('number');
    $.ajax({
        type: 'POST',
        url: 'https://...../api/UpdateOnTap.php', // Replace ... with real domain address
        data: {
            telegram_user_id: telegram_user_id,
            collected: collected
        }
    });
}




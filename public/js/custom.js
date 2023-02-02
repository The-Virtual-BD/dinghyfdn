// Check if donation on or off
$('.scds').css('display', 'none');

var cds = localStorage.getItem('donationstatus');
if (cds == 'yes') {
    $('.scds').css('display', 'block');
}

setTimeout(function(){$('#notificationflush').addClass('hidden')}, 3000);



// Ajax csrf token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#sidemenutoggle').click(function (e) {
        e.preventDefault();
        $('#sidemenutoggle button').toggleClass('rotate-90');
        $('#sidebar').toggleClass('w-52','w-64');
        $('#toggleIcon').toggleClass('rotate-180');
        $('#siteLogo').toggleClass('hidden', 'flex');
        $('.sidelinktext').toggleClass('hidden');
        $('.sidenav a').toggleClass('justify-start','justify-center');
    });

    $('#projectselection').addClass('hidden');
    if ($('input[name="donation_type"]:checked').val() == 2) {
        $('#projectselection').removeClass('hidden');
        getActiveProjects();
    }
    $("select#project").html(' ');

    $(".owl-carousel").owlCarousel({
        loop: true,
        dots: false,
        autoplay: true,
        margin: 10,
        nav:false,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });

});

function openDonateFrom(ammount) {
    let popup = $('#donationPopup');
    popup.toggleClass('hidden');
    popup.toggleClass('flex');
    $('form#donationPopupFrom #dammount').val(ammount);
}

function dfromset(ammount) {
    $('form#donationPopupFrom #dammount').val(ammount).attr('readonly', true);
}

function idfromset(ammount) {
    $('form#indexDonate #dammount').val(ammount).attr('readonly', true);
}

function closeDonateFrom() {
    let popup = $('#donationPopup');
    popup.toggleClass('hidden');
    popup.toggleClass('flex');
    $('form#donationPopupFrom #dammount').val(100).attr('readonly', true);
}

function toggleReadOnly(){
    $('form#donationPopupFrom #dammount').removeAttr('readonly').focus().val('');
}
function toggleiReadOnly(){
    $('form#indexDonate #dammount').removeAttr('readonly').focus().val('');
}

// Only number in text
$('input.onlynumber').keyup(function(e){
    if (/\D/g.test(this.value)){
      this.value = this.value.replace(/\D/g, '');
    }
});


$('input[name="donation_type"]').change(function (e) {
    e.preventDefault();
    let type = $('input[name="donation_type"]:checked').val();
    if ($('input[name="donation_type"]:checked').val() == 2) {
        $('#projectselection').removeClass('hidden');
        getActiveProjects();
    }else {
        $('#projectselection').addClass('hidden');

    }

});




// Donate From Submition -----------------------------
$('form#donationPopupFrom').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: 'POST',
        url: BASE_URL +'home/makeDonation',
        data : $('form#donationPopupFrom').serialize(),
        success: function(response) {
            if (response.status == "success") {
                $('#donatesuccess').html(response.message);
                $('form#donationPopupFrom').trigger("reset");
                setTimeout(function(){
                    $('#donatesuccess').html('');
                    closeDonateFrom();
                }, 3000);
            } else if (response.status == "error") {
                $('#donatesuccess').html(response.message);
                setTimeout(function(){
                    $('#donatesuccess').html('');
                }, 3000);
            }
        }
    });
});
// Donate From Submition end -----------------------------


// Client Subscription -----------------------------
$('form#subscriptionForm').submit(function (e) {
    e.preventDefault();
    let subscribed = $('#subscriptionsuccess');
    $.ajax({
        method: 'POST',
        url: BASE_URL +'subscribe',
        data : $('form#subscriptionForm').serialize(),
        success: function(response) {
            if (response.status == "success") {
                subscribed.html(response.message);
                $('form#subscriptionForm').trigger("reset");
                setTimeout(function(){
                    subscribed.html('');
                }, 5000);
            } else if (response.status == "error") {
                subscribed.html(response.message);
                setTimeout(function(){
                    subscribed.html('');
                }, 5000);
            }
        }
    });
});
// Client Subscription end -----------------------------

// Getting active projects in donation from
function getActiveProjects() {
    $.ajax({
        method: 'GET',
        url: BASE_URL +'home/getactiveProjects',
        success: function(response) {

            var projectsHTML = '';
            if (response.status == "success") {
                var projects = response.data;
                $.each(projects,function (key,value) {
                    projectsHTML += '<option value="'+value.id+'">'+value.title+'</option>';
                });
                $("select#project").html(projectsHTML);
            }
        }
    });
}

function galleryPopup() {
    $('#galleryMediaSlide').toggleClass('hidden');
}


function volunteerapply(){
    $('#volunteerapply').toggleClass('hidden');
}

// Finds all iframes from youtubes and gives them a unique class
$('iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");

function videopopup() {
    $('.youtube-iframe').each(function(index) {
        $(this).attr('src', $(this).attr('src'));
        return false;
      });
    $('#videopopup').toggleClass('hidden').toggleClass('flex');
}


// Parcent meter calculation
$('.scds.fundmeter').each(function (index, element) {
    var raised = $(this).find('input[name="raised"]').val();
    var target = $(this).find('input[name="target"]').val();//10000
    var collected = $(this).find('.collected');
    var parcent = raised/target*100+'%';
    collected.css('width', parcent);
});



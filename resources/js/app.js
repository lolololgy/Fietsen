// Import dependencies
import './bootstrap';  // This is for your other imports (like jQuery)
import $ from 'jquery';  // Make sure jQuery is available
import toastr from 'toastr';  // Import toastr
import 'toastr/build/toastr.min.css';  // Import toastr's CSS

// Make jQuery available globally
window.$ = window.jQuery = $;

// Make toastr available globally
window.toastr = toastr;

// Check if jQuery is working
$(document).ready(function () {
    console.log("jQuery is working!");
});

$(document).ready(function() {

    // Set up AJAX to include CSRF Token automatically
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add-to-cart-btn').click(function() {
        const id = $(this).data('id');
        const type = $(this).data('type');
        const hoeveelheid = $(this).data('hoeveelheid');

        $.ajax({
            url: '/winkelmand/add',
            type: 'POST',
            data: {
                id: id,
                type: type,
                hoeveelheid: hoeveelheid
            },
            success: function(response) {
                alert('Product toegevoegd aan winkelwagen!');
            },
            error: function(error) {
                alert('Er is iets misgegaan.');
            }
        });
    });
});


$(document).ready(function() {
    $('#clear-cart-btn').click(function() {
        $.ajax({
            url: '/winkelmand/clear',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if(response.success) {
                    alert(response.message);
                    console.log('Winkelmand is leeggemaakt.');
                }
            },
            error: function() {
                alert('Er is iets misgegaan bij het legen van de winkelmand.');
            }
        });
    });
});



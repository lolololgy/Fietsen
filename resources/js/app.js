// Import dependencies
import './bootstrap';  // This is for your other imports (like jQuery)
import $ from 'jquery';  // Make sure jQuery is available
import toastr from 'toastr';  // Import toastr
import 'toastr/build/toastr.min.css';  // Import toastr's CSS

// Make jQuery available globally
window.$ = window.jQuery = $;

// Make toastr available globally
window.toastr = toastr;

$(document).ready(function () {
    console.log("jQuery is working!");
});

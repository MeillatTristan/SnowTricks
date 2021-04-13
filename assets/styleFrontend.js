/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import './styles/styleFrontend.css';
// start the Stimulus application
import './bootstrap';
console.log('yo');
// start the Stimulus application
// import './bootstrap';

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

import preview from './preview';

import './add-collection-widget.js';
import popup from './popup.js';
import './loadMore.js';
import './showTrick.js';
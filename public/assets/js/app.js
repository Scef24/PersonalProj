 //import '../../../resources/js/bootstrap';
const books = document.getElementById('books');
const nb_button = document.getElementById('newBooks');
const gn_button = document.getElementById('genEd');
const fil_button = document.getElementById('filipiniana');
const it_button = document.getElementById('it');
const fic_button = document.getElementById('fiction');



nb_button.addEventListener('click',newBooks);
gn_button.addEventListener('click',genBooks);
fil_button.addEventListener('click',filBooks);
it_button.addEventListener('click',itBooks);
fic_button.addEventListener('click',ficBooks);


function newBooks(e){
        e.preventDefault();
        const newElement = document.createElement('li');
        newElement.className = 'nBClass';
        books.innerHTML = 'List of New Books Area';
        books.appendChild(newElement);
}
function genBooks(e){
        e.preventDefault();
        const newElement = document.createElement('li');
        newElement.className = 'genClass';
        books.innerHTML = 'List of Gen Ed Books Area';
        books.appendChild(newElement);
}
function filBooks(e){
        e.preventDefault();
        const newElement = document.createElement('li');
        newElement.className = 'genClass';
        books.innerHTML = 'List of Filipiniana Books Area';
        books.appendChild(newElement);
}
function itBooks(e){
        e.preventDefault();
        const newElement = document.createElement('li');
        newElement.className = 'genClass';
        books.innerHTML = 'List of IT Books Area';
        books.appendChild(newElement);
}
function ficBooks(e){
        e.preventDefault();
        const newElement = document.createElement('li');
        newElement.className = 'genClass';
        books.innerHTML = 'List of Fiction Books Area';
        books.appendChild(newElement);
}
function changeForm(toShow) {
    const inscription = document.getElementById('inscription');
    const connection = document.getElementById('connection');

    if (!inscription || !connection) {
        console.error("Les éléments n'ont pas été trouvés !");
        return;
    }

    if (toShow === 'inscription') {
        inscription.classList.remove('hidden');
        connection.classList.add('hidden');
    } else {
        inscription.classList.add('hidden');
        connection.classList.remove('hidden');
    }
}



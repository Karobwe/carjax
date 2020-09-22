$().ready(function() {
    $('a').click(function (e) {
        e.preventDefault();
    });

    $('#submit').click(function(e) {
        e.preventDefault();
        let datas = $('form').serialize();

        $.ajax({
            url: 'process.php', 
            type: 'get',
            data: datas,
            success: function(response) {
                let vehicule = JSON.parse(response);
                addRow(vehicule.id_vehicule, vehicule.marque, vehicule.modele, vehicule.annee, vehicule.couleur);
                showMessage('Le véhicule a bien été ajouter', 'success');
            },
            error: function () {
                showMessage('Une erreur c\'est produite', 'danger');
            }
        });
    });

    $('.edit').click(function(e) {
        e.preventDefault();
        // On désactive tout les autres inputs
        $('table .form-control').attr('disabled', true);

        // On active que les input de la lign courrante
        let tr = $(this).parent();
        $(tr).find('.form-control').attr('disabled', false);
        $(tr).toggleClass('selected');

        let icon = $(this).find('i.fas');
        icon.removeClass('fa-edit');
        icon.addClass('fa-check-square');

        let row = $(this).parent();
        let link = $(this.querySelector('a'));
        link.click(function (e) {
            e.preventDefault();
        });

        let id = link.attr('data-id');
        id = parseInt(id);
        

        // $.ajax({
        //     url: 'process.php?delete=' + id, 
        //     type: 'get',
        //     success: function(response) {
        //         row.fadeOut();
        //         showMessage('Le véhicule à bien été supprimer', 'warning');
        //     },
        //     error: function () {
        //         showMessage('Une erreur c\'est produite', 'danger');
        //     }
        // });
    });

    $('.remove').click(function(e) {
        e.preventDefault();
        let row = $(this).parent();
        let link = $(this.querySelector('a'));
        link.click(function (e) {
            e.preventDefault();
        });

        let id = link.attr('data-id');
        id = parseInt(id);

        $.ajax({
            url: 'process.php?delete=' + id, 
            type: 'get',
            success: function(response) {
                row.fadeOut();
                showMessage('Le véhicule à bien été supprimer', 'warning');
            },
            error: function () {
                showMessage('Une erreur c\'est produite', 'danger');
            }
        });
    });
});

function addRow(id, marque, modele, annee, couleur) {
    let idTh = document.createElement('th');
    idTh.setAttribute('scope', 'row');
    idTh.innerHTML = id;

    let marqueTd = document.createElement('td');
    marqueTd.innerHTML = marque;

    let modeleTd = document.createElement('td');
    modeleTd.innerHTML = modele;

    let anneeTd = document.createElement('td');
    anneeTd.innerHTML = annee;

    let couleurTd = document.createElement('td');
    couleurTd.innerHTML = couleur;

    let icon = document.createElement('i');
    icon.classList.add('fas', 'fa-trash-alt', 'mr-3');

    let link = document.createElement('a');
    link.setAttribute('href', ''    );
    link.setAttribute('data-id', id);
    link.append(icon);
    link.addEventListener('clik', function(e) {
        e.preventDefault();
    });
    
    let removeTd = document.createElement('td');
    removeTd.classList.add('remove');
    removeTd.append(link);

    let tr = document.createElement('tr');
    tr.append(idTh, marqueTd, modeleTd, anneeTd, couleurTd, removeTd);
    $('tbody').append(tr);
}

function showMessage(message, type) {
    let div = $('#message');
    let bootstrapClass = ['primary', 'secondary', 'success', 'info', 'warning', 'danger', 'dark', 'light', 'white'];

    if(bootstrapClass.includes(type)) {
        div.attr('class', 'alert alert-' + type);
    } else {
        div.attr('class', 'alert alert-info');
    }

    if(!message) {
        message = 'Message vide';
    }
    
    div.text(message)
}
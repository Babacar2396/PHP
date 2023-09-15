//console.log('wi');

setTimeout(function () {
    var successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 1000);

setTimeout(function () {
    var errorAlert = document.querySelector('.alert-danger');
    if (errorAlert) {
        errorAlert.style.display = 'none';
    }
}, 1000);


function fetchData(url) {
    return fetch(url)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Erreur lors de la requête : " + response.status);
            }
        })
        .catch(error => {
            console.error(error);
        });
}
async function processData(url) {
    try {
        const data = await fetchData(url);
        console.log(data);
        return data;

    } catch (error) {
        console.error(error);
    }
}

function createElement(element){
    return document.createElement(element);
}

function chargerSelectNiveau(data,selectclasse) {
    let j = 1;
    selectclasse.innerHTML = '';
    const option1 = createElement('option');
    option1.innerHTML = "choisir une classe";
    selectclasse.appendChild(option1);
    for (let i = 0; i <= data.length; i++) {
        const option = createElement('option');
        option.innerHTML = data[i].nom_classe;
        option.value = data[i].id_classe;
        selectclasse.appendChild(option);
    };
}

function chargerDiscipline(data, disciplinesContainer) {
    let j = 1;
    disciplinesContainer.innerHTML = '';
    var row = document.createElement('div');
    row.classList.add('row', 'justify-content-center');
    var count = 0;

    if (data.length === 0) {
        var message = document.createElement('div');
        message.classList.add('no-disciplines-message', 'text-center');
        message.textContent = 'Pas encore de disciplines pour cette classe';
        disciplinesContainer.appendChild(message);
    } else {
        data.forEach(function (discipline, index) {
            var column = document.createElement('div');
            column.classList.add('col-md-4', 'discipline-column');
            var checkboxId = 'discipline-' + discipline.id;
            var checkbox = document.createElement('input');
            checkbox.setAttribute('type', 'checkbox');
            checkbox.setAttribute('id', checkboxId);
            checkbox.setAttribute('name', 'discipline[]');
            checkbox.setAttribute('value', discipline.id_discipline);
            checkbox.checked = true;
            checkbox.classList.add('discipline-checkbox');

            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    this.parentNode.classList.remove('unchecked');
                } else {
                    this.parentNode.classList.add('unchecked');
                }
            });

            var label = document.createElement('label');
            label.setAttribute('for', checkboxId);
            label.textContent = discipline.nom + ' ' + discipline.code;
            column.appendChild(checkbox);
            column.appendChild(label);
            row.appendChild(column);
            count++;

            if (count % 3 === 0) {
                disciplinesContainer.appendChild(row);
                row = document.createElement('div');
                row.classList.add('row', 'justify-content-center');
            }
        });

        if (count % 3 !== 0) {
            disciplinesContainer.appendChild(row);
        }
    }
}


//----------------------------------------------------------------
// charger classes

let urlClasse = "http://localhost:8000/niveaux/classes/";

const selectNiveau = document.querySelector("#select-niveau");
const selectClasses = document.querySelector("#select-classes");


selectNiveau?.addEventListener("change", function () {
    const seletedN = selectNiveau.selectedIndex
    //const selectValue = selectNiveau.options[seletedN].value
    
    processData(urlClasse + "" + seletedN)
    .then(data=>{
         //console.log(data)
        chargerSelectNiveau(data,selectClasses);    
    })
});


//----------------------------------------------------------------
// afficher disciplines

let urldisciplines = "http://localhost:8000/classe/disciplines/";

const disciplinesContainer = document.querySelector("#disciplines-container");
var label = document.getElementById('labs');

selectClasses?.addEventListener("change", function () {

    var seletedC = selectClasses.selectedIndex
    var classeValue = selectClasses.options[seletedC]
    var nom = classeValue.textContent;

    var labelText = label.textContent;
    labelText = 'Disciplines de la classe' + ' ';
    var newPhrase = labelText + nom;
    label.textContent = newPhrase;

    processData(urldisciplines + "" + seletedC)
    .then(data => {
        //console.log(data)
        chargerDiscipline(data, disciplinesContainer);
    })

});


//----------------------------------------------------------------
// ajouter disciplines

var selectElement = document.getElementById('select-groupe');
var addButton = document.getElementById('addDisc');
var inputField = document.getElementById('disci');

selectClasses?.addEventListener("change", function () {
    var selectedClass = selectClasses.value;

    selectElement.addEventListener('change', function () {
        var selectedGroup = selectElement.value;

        addButton.addEventListener('click', function () {
            var disciplineName = inputField.value;
            var disciplineCode = '(' + disciplineName.substring(0, 3).toUpperCase() + ')';

            var data = {
                newdisc: disciplineName,
                code: disciplineCode,
                groupe: selectedGroup,
                classe: selectedClass
            };

            fetch("http://localhost:8000/discipline/gestion", {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    
                })
                .catch(error => {
                    console.log('error');
                });     
        });
    });
});


// to delete disc

var buttons = document.querySelectorAll('button[data-nom]');

buttons.forEach(function (button) {
    button?.addEventListener  ('click', function () {
        var disciplineName = button.getAttribute('data-nom');
        //alert(disciplineName);
        fetch('http://localhost:8000/delete/disc', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                namedisc: disciplineName
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('La discipline a été supprimée avec succès!');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de la discipline.');
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
});


// to update disc

var updateCoefButton = document.getElementById('updateCoef');
updateCoefButton.disabled=true;

updateCoefButton?.addEventListener('click', function () {

    let changes = document.querySelectorAll(".tochange");
    if(validateInputs){
    var updatedData = [];

    changes.forEach(change => {
        let get = change.getAttribute("data-nom");
        let test = get.split("_");
        let objet = {
            id: test[0],
            type: change.name
        };
        objet["value"] =change.value;
        updatedData.push(objet);
        change.classList.add('bg-success');
        
    });

    //console.table(updatedData);

    fetch('http://localhost:8000/update/disc', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedData)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Les données ont été mises à jour avec succès!');
            } else {
                alert('Erreur lors de la mise à jour des données.');
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
});

let inputs = document.querySelectorAll('.torecup');

inputs.forEach(input => {
    input.addEventListener('change', function () {
        input.classList.add('tochange');

    });
    input.addEventListener('input', function () {
        input.classList.remove('text-danger','text-success')
       
        updateCoefButton.disabled=true;


    if (+input.value<10) {
        input.classList.add('text-danger')
        
        // console.log(updateCoefButton);

        
    }else{
        input.classList.add('text-success')
        updateCoefButton.disabled=false;
        

    }
   

    });
});

// Fonction pour valider les entrées des notes
function validateInputs() {
    var rows = document.querySelectorAll('tbody tr');
    var isValid = true;

    rows.forEach(function (row) {
        var ressourceInput = row.querySelector('input[name="ressource"]');
        var examenInput = row.querySelector('input[name="examen"]');
        var ressourceValue = parseInt(ressourceInput.value);
         var examenValue = parseInt(examenInput.value);
        var errorMessage = row.querySelector('.error-message');

        errorMessage.textContent = '';

        if (ressourceValue < 10) { // Vérifier si la note de ressource est inférieure à 10
            errorMessage.textContent = 'La note de ressource doit être supérieure ou égale à 10.';
            isValid = false;

            setTimeout(function () {
                errorMessage.textContent = '';
            }, 2000);
        }

        if (examenValue < 10) { // Vérifier si la note d'examen est inférieure à 10
            errorMessage.textContent = 'La note d\'examen doit être supérieure ou égale à 10.';
            isValid = false;

            setTimeout(function () {
                errorMessage.textContent = '';
            }, 5000);
        }
    });

    return isValid;
}


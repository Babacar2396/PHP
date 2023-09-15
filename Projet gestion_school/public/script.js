const selectNiveau = document.getElementById("select-niveau");
const selectGroupe = document.getElementById("select-groupe");
const selectClasses = document.getElementById("select-classes");
const inputDiscipline = document.getElementById("disci");
const addGrpButton = document.getElementById("addGrp");
const addDiscButton = document.getElementById("addDisc");
const updateButton = document.getElementById("update-button");
const disciplinesContainer = document.getElementById("disciplines-container");


selectNiveau?.addEventListener("change", () => {
  const niveauId = selectNiveau.value;
  chargerData(niveauId, "chargerClasses", populateClasses);
});

selectGroupe?.addEventListener("change", () => {
  const groupeId = selectGroupe.value;
  chargerData(groupeId, "chargerDisciplines", populateDisciplines);
});

selectClasses?.addEventListener("change", () => {
  const classeId = selectClasses.value;
  chargerData(classeId, "chargerGroupeDisciplines", populateGroupeDisciplines);
});

addGrpButton?.addEventListener("click", () => {
  const newGroupe = document.getElementById("disc").value;
  addGroupe(newGroupe);
});

addDiscButton?.addEventListener("click", () => {
  const classeId = selectClasses.value;
  const discipline = inputDiscipline.value;
  addDiscipline(classeId, discipline);
});

updateButton?.addEventListener("click", () => {
  const checkboxes = document.querySelectorAll(".form-check-input");
  const disciplines = Array.from(checkboxes).map((checkbox) => ({
    id: checkbox.getAttribute("data-id"),
    checked: checkbox.checked,
  }));
  updateDisciplines(disciplines);
});

function chargerData(id, action, callback) {
  const data = { id: id };
  fetch(`http://localhost:8000/Discipline/${action}/`, {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      callback(data);
    })
    .catch((error) => {
      console.log(error);
    });
}

function populateClasses(classes) {
  selectClasses.innerHTML = "";
  classes.forEach((classe) => {
    const option = document.createElement("option");
    option.value = classe.id_classe;
    option.textContent = classe.NOM;
    selectClasses.appendChild(option);
  });
}

function populateDisciplines(disciplines) {
  selectClasses.disabled = false;
  selectClasses.value = "";
  inputDiscipline.value = "";

  disciplinesContainer.innerHTML = "";
  if (disciplines.length > 0) {
    disciplines.forEach((discipline) => {
      const div = document.createElement("div");
      div.classList.add("form-check", "form-check-inline");

      const input = document.createElement("input");
      input.classList.add("form-check-input");
      input.type = "checkbox";
      input.checked = discipline.etat;
      input.setAttribute("data-id", discipline.id_disc);

      const label = document.createElement("label");
      label.classList.add("form-check-label");
      label.textContent = discipline.nom_disc;

      div.appendChild(input);
      div.appendChild(label);

      disciplinesContainer.appendChild(div);
    });
  } else {
    const noDisciplineMessage = document.createElement("div");
    noDisciplineMessage.classList.add("no-disciplines-message");
    noDisciplineMessage.textContent = "Aucune discipline disponible.";
    disciplinesContainer.appendChild(noDisciplineMessage);
  }
}
function populateGroupeDisciplines(disciplines) {
    disciplinesContainer.innerHTML = "";
    if (disciplines.length > 0) {
    disciplines.forEach((discipline) => {
    const div = document.createElement("div");
    div.classList.add("form-check", "form-check-inline");
    
    const input = document.createElement("input");
    input.classList.add("form-check-input");
    input.type = "checkbox";
    input.checked = discipline.etat;
    input.setAttribute("data-id", discipline.id_disc);
  
    const label = document.createElement("label");
    label.classList.add("form-check-label");
    label.textContent = discipline.nom_disc;
  
    div.appendChild(input);
    div.appendChild(label);
  
    disciplinesContainer.appendChild(div);
  });
  
} else {
    const noDisciplineMessage = document.createElement("div");
    noDisciplineMessage.classList.add("no-disciplines-message");
    noDisciplineMessage.textContent = "Aucune discipline disponible.";
    disciplinesContainer.appendChild(noDisciplineMessage);
    }
    }
    
    function addGroupe(newGroupe) {
    const data = { newgrp: newGroupe };
    fetch("http://localhost:8000/Discipline/addGroupeDiscipline/", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
    "Content-Type": "application/json",
    },
    })
    .then((response) => response.json())
    .then((data) => {
    populateGroupeDropdown(data);
    })
    .catch((error) => {
    console.log(error);
    });
    }
    
    function addDiscipline(classeId, discipline) {
    const data = {
    id_class: classeId,
    LIBELLE: discipline,
    id_gd: selectGroupe.value,
    };
    
    fetch("http://localhost:8000/Discipline/insertDiscipline/", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
    "Content-Type": "application/json",
    },
    })
    .then((response) => response.json())
    .then((data) => {
    populateGroupeDisciplines(data);
    })
    .catch((error) => {
    console.log(error);
    });
    }
    
    function updateDisciplines(disciplines) {
    fetch("http://localhost:8000/Discipline/updateDisciplines/", {
    method: "POST",
    body: JSON.stringify(disciplines),
    headers: {
    "Content-Type": "application/json",
    },
    })
    .then((response) => response.json())
    .then((data) => {
    populateGroupeDisciplines(data);
    })
    .catch((error) => {
    console.log(error);
    });
    }

    const supprimer = document.querySelectorAll('.supprimer');



    supprimer.forEach((element) => {
        element.addEventListener('click', () => {
            const id = element.getAttribute('data-id-discipline');
            // console.log(id_discipline);
            const data = {
                id: id
            }
            console.log(data);
            fetch('http://localhost:4000/Coefdisc/suppression', {
                method: 'POST',
                body: JSON.stringify(data)
            })
                .catch(error => {
                    console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
                });
            window.location.reload();
        })
    });
    const tab = [];
    let data;
    
    // document.addEventListener('DOMContentLoaded', () => {
      const inputs = document.querySelectorAll('input[type="number"]');
      const updateCoefButton = document.getElementById('updateCoef');
    
      // Ajouter un écouteur de changement à chaque input
      inputs.forEach(input => {
        input.addEventListener('change', () => {
          input.classList.add('change');
        });
      });

    
      // Ajouter un écouteur de clic au bouton "Mettre A jour"
      updateCoefButton.addEventListener('click', () => {
        const changedInputs = document.querySelectorAll('input.change');
    
        // Changer le background des inputs modifiés en rouge
        changedInputs.forEach(input => {

          const id = input.getAttribute('name')
          console.log(id);
          input.style.backgroundColor = 'green';
          if (input.classList.contains('resource')) {
           const resource =input.value
           tab.push({
            resource:resource,
            id:id
            
           })            
          }
          if (input.classList.contains('examen')) {
            const examen = input.value
            tab.push({
              examen:examen,
              id:id
              
             })  
            
          }
        });
  
        data = {tab:tab}
        console.log(data);
        
        fetch('http://localhost:4000/Room/miseAjour', {
          method: 'POST',
          body: JSON.stringify(data)

      })
      // .then(response=>response.json())
      // .then(result=>console.log(result))
      .catch(error => {
          console.error('Une erreur s\'est produite lors de la mise à jour:', error);
      });


        // Réinitialiser les classes des inputs modifiés
        changedInputs.forEach(input => {
          input.classList.remove('change');
        });
      });
    

   
   

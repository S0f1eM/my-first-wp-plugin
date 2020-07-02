/**
* function : searchDirName 
* Fonction de recherche pour l'annuaire 
* @variables :
* search : champs de saisie de la recherche
* capSearch : Passe la recherche saisie en majuscule
* directory : div qui contient les details du membre dont son nom
* person : div qui contient le a correspondant au nom
* name : la div qui contient le nom et prénom de la personne
* LaboFilter : prends en compte le filtre par laboratoire dans la recherche
**/

function searchDirName() {
    let search, capSearch, directory, person, name, valFilter;

    search = document.getElementById("input-name-front-search");
    capSearch = search.value.toUpperCase();
    directory = document.getElementById("details-staff-directory");//ul
    person = directory.getElementsByClassName("staff-directory");//li

    for (let i = 0; i < person.length; i++) {

      name = person[i].getElementsByClassName("name-directory")[0];
      valFilter = new RegExp($('#filter-lab-directory').val());

        if (name.innerHTML.toUpperCase().indexOf(capSearch) > -1) {
//prend en compte le filtre de recherche par laboratoire
          let LaboFilter = $('#filter-lab-directory').change(filterLab);
//si le filtre est sur ALL (value=all) 
            if ( LaboFilter && (valFilter =="/all/")) {

              person[i].style.display = "";

            } else {

              $('.staff-directory').hide();
//si le filtre est sur un labo specifique
              $('#filter-lab-directory').change(filterLab);
              
            let laboPerson =  $('.staff-directory').filter(function() {
                return valFilter.test($(this).text());
             }).show();

            person = laboPerson;

            person[i].style.display = "";

            }

        } else {

            person[i].style.display = "none";
        }
    }
};



jQuery(document).ready(function($) {
/** 
* function : filterLab
* Fonction de filtre par laboratoire pour l'annuaire 
* On nomme la fonction pour permettre son appel au chargement de la page
* @variables :
* valFilter : valeur selectionnée dans el menu déroulant (select)
*/
function filterLab() {

    let valFilter = new RegExp($('#filter-lab-directory').val());

          if (valFilter =="/all/"){
             
             $('.filter-lab-directory').val('');
             $('.staff-directory').show();

          } else {
              $('.staff-directory').hide();
              $('.staff-directory').filter(function() {
                return valFilter.test($(this).text());
             }).show();
        }
  };

/*
* filtre du menu deroulant par affectation au changement du select
**/
$(function () {
  $('#filter-lab-directory').change(filterLab);
});

//Lance la fonction de filtre par unité au chargement/rechargement de la page 
jQuery(window).load(filterLab);



function uncheckCivil() {

  let Mme = document.getElementsByClass('smwp-checkbox-form-mme');
  let  Mr = document.getElementsByClass('smwp-checkbox-form-m');

  if (Mme.checked) {
      Mr.checked == false;
  } 
  else if (Mr.checked) {
      Mme.checked == false;
  } 
}

});



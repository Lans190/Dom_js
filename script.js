function ajouterPays() {
  const select = document.getElementById("lepays");
  const input = document.getElementById("C5");
  const newCountry = input.value.trim();

  let exists = false;
  for (let i = 0; i < select.options.length; i++) {
    if (select.options[i].text.toLowerCase() === newCountry.toLowerCase()) {
      exists = true;
      break;
    }
  }

  if (!exists && newCountry !== "") {
    const option = new Option(newCountry, newCountry);
    select.add(option);
    alert("Pays ajouté avec succès !");
  } else if (exists) {
    alert("Ce pays existe déjà !");
  } else {
    alert("Champ vide !");
  }
}

function verifierFormulaire() {
  let isValid = true;

  const nom = document.getElementById("C1").value.trim();
  const T2 = document.getElementById("T2");
  if (nom.length < 8 || nom.length > 20) {
    T2.innerHTML = "Nom/prénom invalide (8 à 20 caractères)";
    T2.style.color = "red";
    document.getElementById("C1").style.color = "red";
    isValid = false;
  } else {
    T2.innerHTML = "";
    document.getElementById("C1").style.color = "black";
  }

  const adresse = document.getElementById("C2").value.trim();
  const T3 = document.getElementById("T3");
  if (adresse.length < 20) {
    T3.innerHTML = "Adresse trop courte";
    T3.style.color = "red";
    document.getElementById("C2").style.color = "red";
    isValid = false;
  } else {
    T3.innerHTML = "";
    document.getElementById("C2").style.color = "black";
  }

  const postal = document.getElementById("C3").value.trim();
  const T4 = document.getElementById("T4");
  const localite = document.getElementById("C4");

  if (postal !== "3000" && postal !== "4000") {
    T4.innerHTML = "Code postal invalide (3000 ou 4000)";
    T4.style.color = "red";
    document.getElementById("C3").style.color = "red";
    localite.value = "";
    isValid = false;
  } else {
    T4.innerHTML = "";
    document.getElementById("C3").style.color = "black";
    if (postal === "3000") localite.value = "ville1";
    else if (postal === "4000") localite.value = "ville2";
  }

  return isValid;
}

function afficherAlert() {
  if (!verifierFormulaire()) {
    alert("Veuillez corriger les erreurs dans le formulaire.");
    return;
  }

  const civilite = document.querySelector('input[name="civilite"]:checked').value;
  const nom = document.getElementById("C1").value;
  const adresse = document.getElementById("C2").value;
  const postal = document.getElementById("C3").value;
  const localite = document.getElementById("C4").value;
  const pays = document.getElementById("lepays").value;

  const plateformes = Array.from(document.querySelectorAll('input[name="materiel"]:checked'))
    .map(input => input.value)
    .join(", ");

  const applications = Array.from(document.forms["F"].elements["applications"].selectedOptions)
    .map(option => option.value)
    .join(", ");

  const message = `Civilité: ${civilite}
Nom: ${nom}
Adresse: ${adresse}
Code postal: ${postal}
Localité: ${localite}
Pays: ${pays}
Plateformes: ${plateformes}
Applications: ${applications}`;

  alert(message);
}

function enregistrer() {
  if (!verifierFormulaire()) {
    alert("Corrigez les erreurs avant d’enregistrer !");
    return;
  }

  const formData = {
    civilite: document.querySelector('input[name="civilite"]:checked').value,
    nom: document.getElementById("C1").value,
    adresse: document.getElementById("C2").value,
    postal: document.getElementById("C3").value,
    localite: document.getElementById("C4").value,
    pays: document.getElementById("lepays").value
  };

  localStorage.setItem("formData", JSON.stringify(formData));
  alert("Données enregistrées avec succès !");
}

function recuperer() {
  const saved = localStorage.getItem("formData");
  if (!saved) {
    alert("Aucune donnée enregistrée !");
    return;
  }

  const data = JSON.parse(saved);
  document.querySelector(`input[name="civilite"][value="${data.civilite}"]`).checked = true;
  document.getElementById("C1").value = data.nom;
  document.getElementById("C2").value = data.adresse;
  document.getElementById("C3").value = data.postal;
  document.getElementById("C4").value = data.localite;
  document.getElementById("lepays").value = data.pays;
}

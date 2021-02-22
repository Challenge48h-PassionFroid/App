@extends('layout')

@section('content')

<h1>Ajouter une image</h1><br>

<form method="post" action="/ajout" enctype='multipart/form-data'>

    <div class="form-group">
        <label for="img">Photo à ajouter :</label>
        <input type="file" id="img" name="Photo" class="form-control-file">
    </div>

    <div class="row form-group">
        <div  class="col-4">
            <label>Nom de l'image :</label>
            <input type="text" name="Nom" class="form-control">
        </div>

        <div  class="col-4">
            <label>Type de l'image :</label>
            <select name="Type" class="form-control">
                <option value="">--Veuillez choisir le type--</option>
                <option value="passionfroid">Photo PassionFroid</option>
                <option value="fournisseur">Photo Fournisseur</option>
                <option value="logo">Logo</option>
            </select>
        </div>

        <div>
            <label>Crédits de la photo :</label>
            <input type="text" name="Credits" placeholder="Nom de l'auteur, nom de la banque d'images, etc..." class="form-control">
        </div>
    </div>

    <br><div class="row form-group">
        <div class="col">
            <p>Le produit est-il visible sur la photo ?</p>
            <input type="radio" id="AvecProduit" name="ProduitVisible" value="AvecProduit" class="form-check-input">
            <label for="AvecProduit" class="form-check-label">Avec produit</label><br>
            <input type="radio" id="SansProduit" name="ProduitVisible" value="SansProduit" class="form-check-input">
            <label for="SansProduit" class="form-check-label">Sans produit</label>
        </div>

        <div class="col">
            <p>Un humain est-il visible sur la photo ?</p>
            <input type="radio" id="AvecHumain" name="HumainVisible" value="AvecHumain" class="form-check-input">
            <label for="AvecHumain" class="form-check-label">Avec humain</label><br>
            <input type="radio" id="SansHumain" name="HumainVisible" value="SansHumain" class="form-check-input">
            <label for="SansHumain" class="form-check-label">Sans humain</label>
        </div>

        <div class="col">
            <p>La photo est-elle institutionnelle ?</p>
            <input type="radio" id="Institutionnelle" name="Institutionnelle" value="Institutionnelle" class="form-check-input">
            <label for="Institutionnelle" class="form-check-label">Oui</label><br>
            <input type="radio" id="NonInstitutionnelle" name="Institutionnelle" value="NonInstitutionnelle" class="form-check-input">
            <label for="NonInstitutionnelle" class="form-check-label">Non</label>
        </div>

        <div class="col">
            <p>Quel est le format de l'image ?</p>
            <input type="radio" id="Verticale" name="Format" value="Verticale" class="form-check-input">
            <label for="Verticale" class="form-check-label">Verticale</label><br>
            <input type="radio" id="Horizontale" name="Format" value="Horizontale" class="form-check-input">
            <label for="Horizontale" class="form-check-label">Horizontale</label>
        </div>
    </div>

    <br><div class="row form-group">
        <div class="col">
            <p>Les droits d'utilisation sont-ils limités ?</p>
            <input type="radio" id="UtilisationLimite" name="LimitationUtilisation" value="UtilisationLimite" class="form-check-input">
            <label for="UtilisationLimite" class="form-check-label">Oui</label><br>
            <input type="radio" id="UtilisationNonLimite" name="LimitationUtilisation" value="UtilisationNonLimite" class="form-check-input">
            <label for="UtilisationNonLimite" class="form-check-label">Non</label>
        </div>

        <!-- /!\ A n'afficher que si l'utilisateur à répondu "Oui" à la question des droits d'utilisation limités-->
        <div class="col">
            <p>L'image est-elle protégée par un Copyright ?</p>
            <input type="radio" id="AvecCopyright" name="Copyright" value="AvecCopyright" class="form-check-input">
            <label for="AvecCopyright" class="form-check-label">Oui</label><br>
            <input type="radio" id="SansCopyright" name="Copyright" value="SansCopyright" class="form-check-input">
            <label for="SansCopyright" class="form-check-label">Non</label>
        </div>

        <!-- /!\ A n'afficher que si l'utilisateur à répondu "Oui" à la question des droits d'utilisation limités-->
        <div class="col">
            <label>Date de fin des droits d'utilisation :</label>
            <input type="date" name="DateFinDroits" class="form-control">
        </div>
    </div>

    <div>
        <label>Tags (séparer par des points-virgules) :</label>
        <textarea name="Tags" class="form-control"></textarea>
    </div><br>

    <input type="submit" value="Ajouter">

</form>

@endsection
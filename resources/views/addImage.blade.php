@extends('layout')

@section('content')

<div id="main" class="container">
    <h1 class="my-4">Ajouter une image</h1><br>

    <form enctype='multipart/form-data'>
        {{ csrf_field() }}

        <div class="form-group">
            <label for="img">Photo à ajouter :</label>
            <input type="file" id="img-input" name="files" class="form-control-file">
        </div>

        <!-- Le temps file. ⏳ -->
        <!-- <div class="row form-group">
            <div class="col-4">
                <label>Nom de l'image :</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="col-4">
                <label>Type de l'image :</label>
                <select name="type" class="form-control">
                    <option value="">--Veuillez choisir le type--</option>
                    <option value="passionfroid">Photo PassionFroid</option>
                    <option value="fournisseur">Photo Fournisseur</option>
                    <option value="logo">Logo</option>
                </select>
            </div>

            <div>
                <label>Crédits de la photo :</label>
                <input type="text" name="credits" placeholder="Nom de l'auteur, nom de la banque d'images, etc..." class="form-control">
            </div>
        </div>

        <br>
        <div class="row form-group">
            <div class="col">
                <p>Le produit est-il visible sur la photo ?</p>
                <input type="radio" id="hasAProduct" name="hasAProduct" value="true" class="form-check-input">
                <label for="AvecProduit" class="form-check-label">Avec produit</label><br>
                <input type="radio" id="hasAProduct" name="hasAProduct" value="false" class="form-check-input">
                <label for="SansProduit" class="form-check-label">Sans produit</label>
            </div>

            <div class="col">
                <p>Un humain est-il visible sur la photo ?</p>
                <input type="radio" id="hasAHuman" name="hasAHuman" value="true" class="form-check-input">
                <label for="AvecHumain" class="form-check-label">Avec humain</label><br>
                <input type="radio" id="hasAHuman" name="hasAHuman" value="false" class="form-check-input">
                <label for="SansHumain" class="form-check-label">Sans humain</label>
            </div>

            <div class="col">
                <p>La photo est-elle institutionnelle ?</p>
                <input type="radio" id="Institutionnelle" name="isInstitutional" value="true" class="form-check-input">
                <label for="Institutionnelle" class="form-check-label">Oui</label><br>
                <input type="radio" id="NonInstitutionnelle" name="isInstitutional" value="false" class="form-check-input">
                <label for="NonInstitutionnelle" class="form-check-label">Non</label>
            </div>

            <div class="col">
                <p>Quel est le format de l'image ?</p>
                <input type="radio" id="Verticale" name="imageFormat" value="verticale" class="form-check-input">
                <label for="Verticale" class="form-check-label">Verticale</label><br>
                <input type="radio" id="Horizontale" name="imageFormat" value="horizontale" class="form-check-input">
                <label for="Horizontale" class="form-check-label">Horizontale</label>
            </div>
        </div>

        <br>
        <div class="row form-group">
            <div class="col">
                <p>Les droits d'utilisation sont-ils limités ?</p>
                <input type="radio" id="UtilisationLimite" name="hasLimitedRightsOfUse" value="true" class="form-check-input">
                <label for="UtilisationLimite" class="form-check-label">Oui</label><br>
                <input type="radio" id="UtilisationNonLimite" name="hasLimitedRightsOfUse" value="false" class="form-check-input">
                <label for="UtilisationNonLimite" class="form-check-label">Non</label>
            </div> -->

            <!-- /!\ A n'afficher que si l'utilisateur à répondu "Oui" à la question des droits d'utilisation limités-->
            <!-- <div class="col">
                <p>L'image est-elle protégée par un Copyright ?</p>
                <input type="radio" id="AvecCopyright" name="copyright" value="true" class="form-check-input">
                <label for="AvecCopyright" class="form-check-label">Oui</label><br>
                <input type="radio" id="SansCopyright" name="copyright" value="false" class="form-check-input">
                <label for="SansCopyright" class="form-check-label">Non</label>
            </div> -->

            <!-- /!\ A n'afficher que si l'utilisateur à répondu "Oui" à la question des droits d'utilisation limités-->
            <!-- <div class="col">
                <label>Date de fin des droits d'utilisation :</label>
                <input type="date" name="endDateRightsOfUse" class="form-control">
            </div>
        </div>

        <div>
            <label>Tags (séparer par des points-virgules) :</label>
            <textarea name="tags" class="form-control"></textarea>
        </div><br> -->

        <input type="submit" value="Ajouter" class="btn btn-success">
    </form>
</div>


<script type="text/javascript">
    const formElement = document.querySelector('form');

    formElement.addEventListener('submit', (e) => {
        const token = '<?php echo Session::get('jwt') ?>'
        e.preventDefault()

        const request = new XMLHttpRequest()

        // Exécuter la requête
        try {
            request.open('POST', 'https://chall48h-passionfroid.herokuapp.com/upload')
            request.setRequestHeader('Authorization', 'Bearer ' + token)
            request.send(new FormData(formElement))

            // Clear l'input du formulaire
            document.getElementById('img-input').value = ''

            // Notification de réussite
            const div = document.createElement('div')
            div.classList.add('alert')
            div.classList.add('alert-success')
            const text = document.createTextNode('Votre image a bien été uploadée.')
            div.appendChild(text)
            document.querySelector('#main').appendChild(div)
        } catch {
            const div = document.createElement('div')
            div.classList.add('alert')
            div.classList.add('alert-danger')
            const text = document.createTextNode('Une erreur est survenue.')
            div.appendChild(text)
            document.querySelector('#main').appendChild(div)
        }
    })
</script>

@endsection
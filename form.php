<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required="required" pattern="<?php echo $regex_name; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" required="required" pattern="<?php echo $regex_name; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="tel" name="tel" id="tel" class="form-control" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" required="required" pattern="<?php echo $regex_email; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="demande">Demande :</label>
            <textarea id="demande" name="demande" class="form-control"></textarea>
        </div>
    </div>
</div>

<button class="pull-right btn btn-primary" type="submit">Valider</button>
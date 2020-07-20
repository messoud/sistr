<?php namespace Sistr;
    if(!defined('SISTR')) {throw new Error('Acces interdit');}
   \F3il\Messages::setMessageRenderer('\Sistr\MessagesHelper::messagesRenderer');
    ?>
<h2> Liste des utilisateurs</h2>
 <table class="table table-condensed table-bordered table-striped table-hover">
     <thead> <tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Login</th><th>Création</th><th>Connexion</th><th>Id</th><th>Actions</th></tr></thead>
     <tbody>
     <?php 
         foreach ($this->utilisateurs as $user)
         {
             ?>
        <tr>
            <td><?php echo $user['nom']?></td>
            <td><?php echo $user['prenom']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['login']?></td>
            <td><?php echo $user['creation']?></td>
            <td><?php echo $user['connexion']?></td>
            <td><?php echo $user['id']?></td>
            <td>
                <button type="submit" name="id" value="<?php echo $user['id']?>"  form="edit-form" class="btn btn-default btn-xs "  title="Editer">
                <span class = "glyphicon glyphicon-edit"></span>
                </button>
                <button type="submit" name="id" value="<?php echo $user['id']?>"  form="delete-form" class="btn btn-default btn-xs " title="Supprimer">
                <span class = "glyphicon glyphicon-trash"></span>
                </button>
            </td>
        </tr>
        <?php
         }
    ?>
     </tbody>
    </table>
<form id="delete-form" action="?controller=utilisateur&action=supprimer" method="post"></form>
<form id="edit-form" action="?controller=utilisateur&action=editer" method="post"></form>

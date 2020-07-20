<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire façon HTML5</title>
    </head>
    <body>
        <h1>Formulaire façon HTML5</h1>
        <p>Utilise la possiblité d'avoir des éléments de formulaire en dehors de la balise &lt;form&gt;</p>
        <p>Ici les boutons ne font que transmettre au formulaire l'id de l'élément à supprimer</p>
        <p>Les balises &lt;form&gt; sont à la fin et comportent l'action (juste pour qu'on la voit passer dans l'URL)</p>
        <table>
            <thead>
                <tr>
                    <th>Langage</th>
                    <th>id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>HTML</td>
                    <td>4</td>
                    <td>
                        <button name="id" value="4" form="edit-form">E</button>
                        <button name="id" value="4" form="delete-form">S</button>
                    </td>
                </tr>
                <tr>
                    <td>CSS</td>
                    <td>2</td>
                    <td>                       
                        <button name="id" value="2" form="edit-form">E</button>
                        <button name="id" value="2" form="delete-form">S</button>
                    </td>
                </tr>
                <tr>
                    <td>PHP</td>
                    <td>1</td>
                    <td>                       
                        <button name="id" value="1" form="edit-form">E</button>
                        <button name="id" value="1" form="delete-form">S</button>
                    </td>
                </tr>
                <tr>
                    <td>JavaScript</td>
                    <td>7</td>
                    <td>                       
                        <button name="id" value="7" form="edit-form">E</button>
                        <button name="id" value="7" form="delete-form">S</button>
                    </td>
                </tr>
                <tr>
                    <td>Ajax</td>
                    <td>5</td>
                    <td>                       
                        <button name="id" value="5" form="edit-form">E</button>
                        <button name="id" value="5" form="delete-form">S</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <form id="delete-form" method="GET" action="#">
            <input type="hidden" name="command" value="delete"/>
        </form>
        <form id="edit-form" method="GET" action="#">
            <input type="hidden" name="command" value="edit"/>
        </form>
    </body>
</html>
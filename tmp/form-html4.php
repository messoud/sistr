<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire façon HTML4</title>
    </head>
    <body>
        <h1>Formulaire façon HTML4</h1>
        <p>Nécessite d'avoir un formulaire par élément</p>
        <p>Ici les boutons transmettent la commande à utiliser pour un élément dont l'id est dans un champ caché<p>
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
                        <form action="#" method="GET">
                            <input type="hidden" name="id" value="4"/>
                            <button type="submit" name="commande" value="edit">E</button>
                            <button type="submit" name="commande" value="delete">S</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>CSS</td>
                    <td>2</td>
                    <td>
                        <form action="#" method="GET">
                            <input type="hidden" name="id" value="2"/>
                            <button type="submit" name="commande" value="edit">E</button>
                            <button type="submit" name="commande" value="delete">S</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>PHP</td>
                    <td>1</td>
                    <td>
                        <form action="#" method="GET">
                            <input type="hidden" name="id" value="1"/>
                            <button type="submit" name="commande" value="edit">E</button>
                            <button type="submit" name="commande" value="delete">S</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>JavaScript</td>
                    <td>7</td>
                    <td>
                        <form action="#" method="GET">
                            <input type="hidden" name="id" value="7"/>
                            <button type="submit" name="commande" value="edit">E</button>
                            <button type="submit" name="commande" value="delete">S</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Ajax</td>
                    <td>5</td>
                    <td>
                        <form action="#" method="GET">
                            <input type="hidden" name="id" value="5"/>
                            <button type="submit" name="commande" value="edit">E</button>
                            <button type="submit" name="commande" value="delete">S</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>        
    </body>
</html>



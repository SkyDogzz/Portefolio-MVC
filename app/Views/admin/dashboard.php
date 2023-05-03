<table>
    <thead>
        <tr>
            <th>Sujet</th>
            <th>Message</th>
            <th>Email</th>
            <th>Activé</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?= $contact['subject'] ?></td>
                <td><?= $contact['message'] ?></td>
                <td><?= $contact['email'] ?></td>
                <td><?= $contact['is_active'] ? 'Oui' : 'Non' ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php
var_dump($contacts);

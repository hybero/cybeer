
<div class="clients">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Company</th>
              <th scope="col">Phone</th>
              <th scope="col">Town</th>
              <th scope="col">Address</th>
              <th scope="col">Postcode</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($clients)) { foreach ($clients as $clients_item): ?>

                <tr>
                    <th scope="id"><?php echo $clients_item['id']; ?></th>
                    <td scope="name"><?php echo $clients_item['name']; ?></td>
                    <td scope="surname"><?php echo $clients_item['surname']; ?></td>
                    <td scope="company"><?php echo $clients_item['company']; ?></td>
                    <td scope="phone"><?php echo $clients_item['phone']; ?></td>
                    <td scope="town"><?php echo $clients_item['town']; ?></td>
                    <td scope="address"><?php echo $clients_item['address']; ?></td>
                    <td scope="postcode"><?php echo $clients_item['postcode']; ?></td>
                </tr>

            <?php endforeach; } ?>

        </tbody>
    </table>

</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

    <h2>Users List</h2>

    <table border="1" id="usersTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>




    </table>


    
<script>
    let table = document.getElementById("usersTable");

    fetch("users.php")
        .then(response => response.json())
        .then(users => {
            users.forEach(user => {
                let row = document.createElement("tr");

            
                let idCell = document.createElement("td");
                idCell.textContent = user.id;
                row.appendChild(idCell);

            
                let nameCell = document.createElement("td");
                nameCell.textContent = user.name;
                row.appendChild(nameCell);

           
                let emailCell = document.createElement("td");
                emailCell.textContent = user.email;
                row.appendChild(emailCell);


                let editCell = document.createElement("td");
                let editButton = document.createElement("button");
                editButton.textContent = "Edit";

                editButton.addEventListener("click", function() {
                    window.location.href = "edit.html?id=" + user.id;
                });

                editCell.appendChild(editButton);
                row.appendChild(editCell);


                let deleteCell = document.createElement("td");
                let deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";

                deleteButton.addEventListener("click", function()
                 {
                      window.location.href = "delete.html?id=" + user.id;
               });

              deleteCell.appendChild(deleteButton);
              row.appendChild(deleteCell);

                
                table.appendChild(row);
            });
        });
</script>





            




       

</body>
</html>

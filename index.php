<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
hiiiiiiiiiiiiiiiii32222
<div class="container mt-5">
    <h2 class="mb-4">Users List</h2>

    <div id="loading" class="alert alert-info">Loading...</div>

    <div id="users" class="row"></div>
</div>

<script>
const API_URL = "https://api.9ne3etmisr.com/api/index.php?url=v1/users";
const TOKEN = "secret123"; // أو من localStorage

fetch(API_URL, {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer " + TOKEN
    }
})
.then(res => res.json())
.then(data => {
    document.getElementById("loading").style.display = "none";

    const users = data.data || [];
    const container = document.getElementById("users");

    if (users.length === 0) {
        container.innerHTML = "<p>No users found</p>";
        return;
    }

    users.forEach(user => {
        container.innerHTML += `
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${user.name}</h5>
                        <p class="card-text">${user.tel_num}</p>
                    </div>
                </div>
            </div>
        `;
    });
})
.catch(err => {
    console.error(err);
    document.getElementById("loading").innerHTML = "Error loading data";
});
</script>

</body>
</html>
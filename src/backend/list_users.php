<?php
include('../../config/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="../icon/nuevo-empleado.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List.Users</title>
    <style>
        body {
            background: linear-gradient(135deg, #e3f0ff 0%, #ffffff 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .volver-container {
            margin: 30px 0 20px 40px;
        }
        .btn-volver {
            background: #2563eb;
            color: #fff;
            padding: 10px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
            transition: background 0.2s;
        }
        .btn-volver:hover {
            background: #1e40af;
        }
        table {
            border-collapse: collapse;
            margin: 40px auto;
            width: 90%;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(37,99,235,0.10);
            overflow: hidden;
        }
        th, td {
            padding: 16px 18px;
            text-align: center;
        }
        th {
            background: #2563eb;
            color: #fff;
            font-size: 1.1em;
            letter-spacing: 1px;
        }
        tr:nth-child(even) {
            background: #f3f8ff;
        }
        tr:hover {
            background: #e0eaff;
            transition: background 0.2s;
        }
        img {
            vertical-align: middle;
        }
        td img {
            border: 2px solid #2563eb;
            background: #f3f8ff;
        }
        td a img {
            border: none;
            background: none;
            margin: 0 4px;
            transition: transform 0.15s;
        }
        td a img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="volver-container">
        <a href="../index.html" class="btn-volver">Volver</a>
    </div>

    <table>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "
            SELECT
                id,
                firstname,
                lastname,
                email,
                CASE WHEN status = true THEN 'Active' ELSE 'No Active' END AS status
            FROM users
        ";
        $res = pg_query($conn, $sql);
        if (!$res) {
            echo "<tr><td colspan='6'>Query error</td></tr>";
            exit;
        }
        while ($row = pg_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "<td><img src='../../icons/academic_icon.png' width='40' height='40' style='object-fit: cover; border-radius: 50%;'></td>";
            echo "<td>";
            echo "<a href=''><img src='../../icons/edit.png' width='20' alt='Edit'></a> ";
            echo "<a href=''><img src='../../icons/search.png' width='20' alt='Search'></a> ";
            echo "<a href=''><img src='../../icons/trash.png' width='20' alt='Delete'></a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

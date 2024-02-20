<!DOCTYPE html>
<html>
<head>
  <title>{{ $title }}</title>
  <style>
      body {
          font-family: Arial, sans-serif;
          font-size: 12px;
      }
      table {
          width: 100%;
          border-collapse: collapse;
      }
      table, th, td {
          border: 1px solid black;
      }
      th, td {
          padding: 8px;
          text-align: left;
      }
      th {
          background-color: #f2f2f2;
      }
  </style>
</head>
<body>
<h1>{{ $title }}</h1>
<p>This PDF document is generated using domPDF in Laravel and lists all {{ strtolower($title) }}.</p>

<table>
  <thead>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Activity sphere</th>
    <th>Region</th>
    <th>Estimated cost</th>
    <th>Investor name</th>
    <th>Responsible person</th>
    <th>Local partner</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($data as $sphere)
    <tr>
      <td>{{ $sphere->id }}</td>
      <td>{{ $sphere->name }}</td>
      <td>{{ $sphere->activitySphere->title }}</td>
      <td>{{ $sphere->region->title }}</td>
      <td>~${{ $sphere->estimated_cost }}</td>
      <td>{{ $sphere->potentialInvestor->full_name ?? '' }}</td>
      <td>{{ $sphere->responsible_person }}</td>
      <td>{{ $sphere->local_partner }}</td>
    </tr>
  @endforeach
  </tbody>
</table>

</body>
</html>
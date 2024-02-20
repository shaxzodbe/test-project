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
    <th>Fullname</th>
    <th>Activity sphere</th>
    <th>Region</th>
    <th>Company contact info</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($data as $sphere)
    <tr>
      <td>{{ $sphere->id }}</td>
      <td>{{ $sphere->full_name }}</td>
      <td>{{ $sphere->activitySphere->title }}</td>
      <td>{{ $sphere->region->title }}</td>
      <td>{{ $sphere->company_contact_info }}</td>
      <td>{{ $sphere->created_at->format('Y-m-d H:i:s') }}</td>
      <td>{{ $sphere->updated_at->format('Y-m-d H:i:s') }}</td>
    </tr>
  @endforeach
  </tbody>
</table>

</body>
</html>
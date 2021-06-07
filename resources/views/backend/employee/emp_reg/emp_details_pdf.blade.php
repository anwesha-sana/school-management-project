<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

    <table id="customers">
        <tr>
          <td>
            @php
            $image_path = '/upload/demo-logo.png';
            @endphp
            <img src ="{{ public_path().$image_path }}" width="200" height="100" >
          </td>
          <td>
              <h2>School ERP Software</h2>
              <p>School Address</p>
              <p>Phone : 90909099999</p>
              <p>Email : anwesha@gmail.com</p>
              <p>Employee Registration Page</p>
          </td>
        </tr>
        
      </table>

    <table id="customers">
    <tr>
        <th style="width: 10%">Sl</th>
        <th>Employee Details</th>
        <th>Employee Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Name</td>
        <td>{{ $details->name}}</td>
       
    </tr>
    <tr>
      <td>2</td>
      <td>ID No</td>
      <td>{{ $details->id_no}}</td>
     
  </tr>
    <tr>
      <td>4</td>
      <td>Father's Name</td>
      <td>{{ $details->fname}}</td>
     
  </tr>
  <tr>
    <td>5</td>
    <td>Mother's Name</td>
    <td>{{ $details->mname}}</td>
   
</tr>
<tr>
  <td>6</td>
  <td>Address</td>
  <td>{{ $details->address}}</td>
 
</tr>
<tr>
  <td>7</td>
  <td>Mobile</td>
  <td>{{ $details->mobile}}</td>
 
</tr>
<tr>
  <td>8</td>
  <td>DOB</td>
  <td>{{ date('d-m-Y', strtotime($details->dob)) }}</td>
 
</tr>
<tr>
  <td>9</td>
  <td>Gender</td>
  <td>{{ $details->gender}}</td>
 
</tr>
<tr>
  <td>10</td>
  <td>Religion</td>
  <td>{{ $details->religion}}</td>
</tr>
<tr>
  <td>11</td>
  <td>Designation</td>
  <td>{{ $details['Designation']['name']}}</td>
</tr>
<tr>
  <td>12</td>
  <td>Joining Date</td>
  <td>{{ date('d-m-Y', strtotime($details->join_date)) }}</td>
</tr>
<tr>
  <td>13</td>
  <td>Salary</td>
  <td>{{ $details->salary}}</td>
</tr>
    
</table><br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>

</body>
</html>

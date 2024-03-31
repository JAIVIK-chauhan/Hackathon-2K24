import folium
from folium.plugins import MarkerCluster
import mysql.connector

connection = mysql.connector.connect(host="localhost",port="3306",user="root",database="hackathon_2024")
print("Hello World")
try:
    cursor = connection.cursor(dictionary=True)
    # Query your database to retrieve lat and lng data
    sql = "SELECT lat, lng FROM locations"
    cursor.execute(sql)
    results = cursor.fetchall()
    # Extract lat and lng coordinates from the results
    markerLocs = [[result['lat'], result['lng']] for result in results]
finally:
    cursor.close()
    connection.close()

# Create a Folium map object
mapobj = folium.Map(location=[24.21, 81.08], zoom_start=6)

# Create a marker cluster layer
mCluster = MarkerCluster(name="Markers Example").add_to(mapobj)

# Add markers to the marker cluster layer using the retrieved coordinates
for pnt in markerLocs:
    folium.Marker(location=[pnt[0], pnt[1]],
                  popup="pnt = {0}, {1}".format(pnt[0], pnt[1])).add_to(mCluster)

# Add layer control to the map
folium.LayerControl().add_to(mapobj)

# Save the map as an HTML file
mapobj.save("output.html")

import cgi
import sqlite3

form = cgi.FieldStorage()
artist_text1 = form.getfirst("artist_name", "не задано")
artist_text2 = form.getfirst("artist_genre", "не задано")

db = sqlite3.connect('../music.db')
c = db.cursor()

c.execute("""CREATE TABLE IF NOT EXISTS artists
             (artist_name TEXT, artist_genre TEXT)""")

c.execute("""INSERT INTO artists
             VALUES (?, ?)""", (artist_text1, artist_text2))

print("Content-type: text/html\n")
print("""<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Обработка базы</title>
</head>
<body>""")
print("<h1>Обработка базы Artists</h1>")
print("<p>Имя автора: %s</p>"%artist_text1)
print("<p>Жанр автора: %s</p>"%artist_text2)
print("""</body> </html>""")


c.execute('SELECT * FROM artists')
data = c.fetchall()
print("Content-type: text/html\n")
print("<html><body>")
print("<h1>Данные из базы данных:</h1>")
for row in data:
    print("Name: {} Genre: {}".format(row[0], row[1]))
print("</body></html>/n")

db.commit()

db.close()

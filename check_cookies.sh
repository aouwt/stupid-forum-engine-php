db="/usr/share/cgi-data/forum/stuff.db"
sqlite3 $db "DELETE FROM tokens WHERE expiry < $(date +%s);"

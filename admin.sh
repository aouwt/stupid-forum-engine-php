db="/usr/share/cgi-data/forum/stuff.db"
o=-box
case $1 in
	"c")
		sqlite3 $o $db "SELECT * FROM tokens WHERE expiry < $(date +%s);"
		sqlite3 $db "DELETE FROM tokens WHERE expiry < $(date +%s);"
		;;
		
		
	"del")
		case $2 in
			"post")
				sqlite3 $o $db "SELECT * FROM posts WHERE $3;"
				sqlite3 $db "DELETE FROM posts WHERE $3;"
				;;
				
			"user")
				aid=$(sqlite3 $db "SELECT id FROM users WHERE $3;")
				echo $aid
				sqlite3 $db "UPDATE posts SET author_id = -1 WHERE author_id = $aid;"
				sqlite3 $db "DELETE FROM users WHERE id = $aid;"
				;;
			
		esac
		;;
	
	"d")
		if [ "$2" = "" ]; then
			sqlite3 $o $db ".dump"
		else
			sqlite3 $o $db "SELECT * FROM $2;"
		fi
		;;
esac

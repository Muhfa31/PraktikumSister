<?php
date_default_timezone_set('Asia/Jakarta');

$key = "MIICXAIBAAKBgQC3NDtCZcb9F6vYcG5Ecqukr6W1405ybbNtApggb7AI8ILZRwjW
mTxwYbVwmHoevT8fz6o4uptN8LkYzM9xjlf2C2taivbhWzhDC6la11lyRRqvLU2M
59aAeaYryOA1wopfg5l1CIocyO/wX/xwInF50/OkeHH0gUtPZW8/azSdUwIDAQAB
AoGAevRDETzdX98TJh/O4YFUUSLRRFFZxNJ7KR4kmyBaNKW2K7zQ4bXWKlZpPzgW
PaslQmRNCeWzdYuprktGrh+qSASL27dXcjFrowM1u+ul7jJEELIdmj3E8lgx+xsW
u6iCy9yrVLa8nBq+OSy5sA0LbXK6JlKcGRdIMBZW51Wh4wECQQDbHSrYz2W4cye8
nVZ0C+W6uIjGwx061tceNcS2NjT6rtdwMVbMrI/ld3942ilZKIbW/Iir9R9fyJBJ
mnCz27XLAkEA1guB6A4Y9w980S85Ln2LSEBr7cSROkYQLv5OOcQJ6UxfkdQKqmWW
z2N3FBi0E1hwn8vYlODHy1zlHLjKXAgFmQJAPHRluAAxDp0nH5FBoy8NKWF0y3JW
BD/2hm1LYwK9x1SqOFhEnKAX67X2w79dnS3jVjnC877j8yeBN+2WnulF1QJBAL1Y
FKSow+DZrHqHobfEiw9xHYiJmEbKb8qCX8St7G6ahvhDcOPnVg9DV7VJXRK363kQ
JBke9t6o4GwV87yRxBECQFhzSPQhHFD4/9TcoSZEpia1YKgE5yIzwdjXQGorL/kg
HmerSL1gnAHYPnQwhQzwR4RWDPmu5QYI5fRAPHmrmgY=";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60); // valid for 1 hour
$issuer = "RestApiAuthJWT";
?>
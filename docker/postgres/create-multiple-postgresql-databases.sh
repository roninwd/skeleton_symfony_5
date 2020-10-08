#!/bin/bash

set -e
set -u
function create_user_and_database() {
	local database=$(echo $1 | tr ':' ' ' | awk  '{print $1}')
	local owner=$(echo $1 | tr ':' ' ' | awk  '{print $2}')
	echo "  Creating user and database '$database'"
	psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
	    CREATE ROLE skeleton_test WITH LOGIN PASSWORD 'skeleton_test' ;
	    CREATE DATABASE skeleton_test;
	    ALTER DATABASE skeleton_test OWNER TO skeleton_test;
	    GRANT ALL PRIVILEGES ON DATABASE skeleton_test TO skeleton_test;
EOSQL
}

if [ -n "$POSTGRES_MULTIPLE_DATABASES" ]; then
	echo "Multiple database creation requested: $POSTGRES_MULTIPLE_DATABASES"
	for db in $(echo $POSTGRES_MULTIPLE_DATABASES | tr ',' ' '); do
		create_user_and_database $db
	done
	echo "Multiple databases created"
fi
COMPOSE=docker-compose

up:
	${COMPOSE} up -d

down:
	${COMPOSE} down

cli:
	${COMPOSE} exec php bash

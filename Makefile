COMPOSER := composer
PHP := php
YARN := yarn
WEBSERVER_PID := .web-server-pid
WEBSERVER_PORT := 1664
WEBSERVER_HOST := 127.0.0.1
CURRENT_DIR := $(shell pwd)

.PHONY: install
install:
	@$(COMPOSER) install
	@$(YARN) install

.PHONY: clean
clean:
	@-rm -rf vendor node_modules
	@-rm composer.lock yarn.lock
	@-rm build/*.{amp,css,js}


.PHONY: build
build:
	@$(YARN) build-prod
	@$(PHP) bin/generate.php app > build/app.amp
	@$(PHP) bin/generate.php api > build/api.amp
	@-rm build/*.txt

.PHONY: serve
serve: stop
	@$(PHP) -S $(WEBSERVER_HOST):$(WEBSERVER_PORT) > /dev/null 2>&1 & echo "$$!" > $(WEBSERVER_PID)
	@echo "Server is running http://$(WEBSERVER_HOST):$(WEBSERVER_PORT)"

.PHONY: stop
stop:
	@if [ -e "$(CURRENT_DIR)/$(WEBSERVER_PID)" ] ; \
	then \
		 kill `cat $(CURRENT_DIR)/$(WEBSERVER_PID)`; \
         rm $(CURRENT_DIR)/$(WEBSERVER_PID); \
	fi;
	@echo "Server is stopped."

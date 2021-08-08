FROM node:12
WORKDIR /app/frontend

COPY . .
RUN npm install --unsafe-perm node-sass
RUN npm install

EXPOSE 8080
CMD npm run serve
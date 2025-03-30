FROM node:18-alpine

WORKDIR /app

COPY resources/js/react-app/package*.json /app
RUN npm install

COPY resources/js/react-app/. /app

CMD ["npm", "start"]

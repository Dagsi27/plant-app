FROM node:18-alpine

WORKDIR /app

COPY resources/js/react-app/package*.json /app
RUN npm install

COPY resources/js/react-app/. /app
COPY .env /app
CMD ["npm", "start"]

FROM node:latest

# WORKDIR /usr/app/
# # COPY --from=client /usr/app/client/build/ ./client/build/

# WORKDIR /usr/app/server/
# COPY server/package*.json ./
# RUN npm install -qy
# COPY server/ ./

# ENV PORT 5666

# EXPOSE 5666

# CMD ["npm", "start"]
# FROM node:4.2
COPY . /src
RUN cd /src && npm install
EXPOSE 5666
CMD ["node", "server/src/index.js"]

# # Definir o diretório de trabalho
# WORKDIR /var/www

# # Copiar o package.json e package-lock.json para o diretório de trabalho
# COPY ./package*.json ./
# # COPY ./package*.json ./

# # # Muda o usuário para node
# USER node
# COPY . .
# # Copiar o restante do código-fonte para o diretório de trabalho
# # COPY ./node-server /var/www

# # Garanta queo usuário 'isaque' tenha permissões adequadas
# # RUN chown -R node:node /var/www

# # Instalar as dependências do projeto
# RUN npm install

# # Expor a porta 5666
# EXPOSE 5666

# # Comando para iniciar o servidor
# CMD ["npm", "start"]

# syntax=docker/dockerfile:1

# ARG NODE_VERSION=18.0.0

# FROM node:${NODE_VERSION}-alpine as base
# WORKDIR /usr/src/app
# EXPOSE 5666

# FROM base as dev
# RUN --mount=type=bind,source=package.json,target=package.json \
#     --mount=type=bind,source=package-lock.json,target=package-lock.json \
#     --mount=type=cache,target=/root/.npm \
#     npm ci --include=dev
# USER node
# COPY . .
# CMD npm run dev

# FROM base as prod
# RUN --mount=type=bind,source=package.json,target=package.json \
#     --mount=type=bind,source=package-lock.json,target=package-lock.json \
#     --mount=type=cache,target=/root/.npm \
#     npm ci --omit=dev
# USER node
# COPY . .

# # RUN npm install
# CMD node src/index.js

# syntax=docker/dockerfile:1

# ARG NODE_VERSION=18.0.0

# FROM node:${NODE_VERSION}-alpine as base
# WORKDIR /usr/src/app
# EXPOSE 5666

# # Install dependencies in the dev stage
# FROM base as dev
# COPY package.json package-lock.json ./
# RUN npm ci --include=dev
# USER node
# COPY . .
# CMD ["npm", "run", "dev"]

# # Install dependencies in the prod stage
# FROM base as prod
# COPY package.json package-lock.json ./
# RUN npm ci --omit=dev
# USER node
# COPY . .
# CMD ["node", "src/index.js"]

# syntax=docker/dockerfile:1

# ARG NODE_VERSION=18.0.0

# FROM node:${NODE_VERSION}-alpine as base
# WORKDIR /usr/src/app
# EXPOSE 5666

# # Install dependencies in the dev stage
# FROM base as dev
# WORKDIR /usr/src/app
# COPY package.json package-lock.json ./
# RUN ls -l
# RUN npm ci --include=dev
# USER node
# COPY . .
# CMD ["npm", "run", "dev"]

# # Install dependencies in the prod stage
# FROM base as prod
# WORKDIR /usr/src/app
# COPY package.json package-lock.json ./
# RUN ls -l
# RUN npm ci --omit=dev
# USER node
# COPY . .
# CMD ["node", "src/index.js"]

# syntax=docker/dockerfile:1

# ARG NODE_VERSION=18.0.0

# FROM node:${NODE_VERSION}-alpine as base
# WORKDIR /usr/src/app
# EXPOSE 5666

# # Install dependencies in the dev stage
# FROM base as dev
# WORKDIR /usr/src/app
# COPY package.json ./
# COPY package-lock.json ./
# RUN npm install --include=dev
# COPY . .
# USER node
# CMD ["npm", "run", "dev"]

# # Install dependencies in the prod stage
# FROM base as prod
# WORKDIR /usr/src/app
# COPY package.json ./
# COPY package-lock.json ./
# RUN npm install --omit=dev
# COPY . .
# USER node
# CMD ["node", "src/index.js"]

# syntax=docker/dockerfile:1

# ARG NODE_VERSION=18.0.0

# FROM node:${NODE_VERSION}-alpine as base
# WORKDIR /usr/src/app
# EXPOSE 5666

# # Install dependencies in the dev stage
# FROM base as dev
# WORKDIR /usr/src/app
# COPY package.json ./
# COPY package-lock.json ./
# RUN if [ -f package-lock.json ]; then npm ci --include=dev; else npm install --include=dev; fi
# COPY . .
# USER node
# CMD ["npm", "run", "dev"]

# # Install dependencies in the prod stage
# FROM base as prod
# WORKDIR /usr/src/app
# COPY package.json ./
# COPY package-lock.json ./
# RUN if [ -f package-lock.json ]; then npm ci --omit=dev; else npm install --omit=dev; fi
# COPY . .
# USER node
# CMD ["node", "src/index.js"]




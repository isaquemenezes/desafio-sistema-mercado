FROM node:latest

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar o package.json e package-lock.json para o diretório de trabalho
COPY ./node-server/package*.json ./
# COPY ./package*.json ./

# # Muda o usuário para node
USER node
COPY . .
# Copiar o restante do código-fonte para o diretório de trabalho
# COPY ./node-server /var/www

# Garanta que o usuário 'isaque' tenha permissões adequadas
RUN chown -R 777 node:node /var/www

# Instalar as dependências do projeto
RUN npm install

# Expor a porta 5666
EXPOSE 5666

# Comando para iniciar o servidor
CMD ["npm", "start"]



# Cria o diretório de trabalho e define as permissões
# RUN mkdir -p /node/app/node_modules && chown -R node:node /node/app

# # Define o diretório de trabalho
# WORKDIR /node/app

# # Copia os arquivos package.json e package-lock.json
# COPY package*.json ./

# # Muda o usuário para node
# USER node

# # Instala as dependências do projeto
# RUN npm install

# # Copia o restante do código-fonte e define as permissões
# COPY --chown=node:node . .

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
# # CMD node src/index.js
# CMD ["npm", "start"]


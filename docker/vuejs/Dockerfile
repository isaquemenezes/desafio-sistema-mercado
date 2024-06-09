# Use uma imagem oficial do Node.js como imagem base
FROM node:16 as build

# Define o diretório de trabalho dentro do contêiner
WORKDIR /app

# Copia o arquivo package.json e package-lock.json para o diretório de trabalho
# COPY package*.json ./
# Copia o arquivo package.json e package-lock.json para o diretório de trabalho
COPY ../../client/package*.json ./

# Instala as dependências do projeto
RUN npm install

# Copia o restante dos arquivos do projeto para o diretório de trabalho
# COPY . .
COPY ../../client .

# Ajusta as permissões dos arquivos
RUN chmod -R 755 /app

# Compila o projeto para produção
RUN npm run build

# Usa uma imagem do Nginx para servir os arquivos estáticos
FROM nginx:alpine

# Copia os arquivos compilados do build para o diretório de onde o Nginx serve os arquivos
COPY --from=build /app/dist /usr/share/nginx/html

# Exponha a porta que o Nginx vai usar
EXPOSE 80

# Comando para rodar o Nginx
CMD ["nginx", "-g", "daemon off;"]


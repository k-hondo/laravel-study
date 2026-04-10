FROM php:8.4-cli

# 作業ディレクトリ
WORKDIR /app

# 必要パッケージ
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpq-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        zip \
        bcmath \
        mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリコピー
COPY . .

# 環境変数ファイルコピー（存在しない場合は無視）
RUN cp .env.example .env || true

# 依存関係インストール
RUN composer install --no-dev --optimize-autoloader

# Laravel最適化
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# storageリンク
RUN php artisan storage:link || true

# ポート
EXPOSE 10000

# 起動（マイグレーションも自動実行）
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
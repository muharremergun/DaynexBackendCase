CREATE TABLE IF NOT EXISTS products (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title_tr TEXT NOT NULL,
  title_tr_alt TEXT,
  info_tr TEXT,
  description_tr TEXT,
  seo_slug_tr TEXT,
  meta_title_tr TEXT,
  meta_keywords_tr TEXT,
  meta_desc_tr TEXT,
  video_embed TEXT,
  sku TEXT NOT NULL UNIQUE,
  quantity INTEGER DEFAULT 0,
  extra_discount REAL DEFAULT 0,
  tax_rate REAL DEFAULT 18,
  price_tl REAL DEFAULT 0,
  price_usd REAL,
  price_eur REAL,
  second_price_tl REAL,
  stock_deduction INTEGER DEFAULT 1,
  status INTEGER DEFAULT 1,
  feature_block INTEGER DEFAULT 1,
  new_until TEXT,
  `order` INTEGER DEFAULT 0,
  home_display INTEGER DEFAULT 0,
  is_new INTEGER DEFAULT 0,
  installment INTEGER DEFAULT 0,
  warranty TEXT,
  created_at TEXT,
  updated_at TEXT
);

CREATE TABLE IF NOT EXISTS product_images (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  product_id INTEGER NOT NULL,
  path TEXT NOT NULL,
  is_main INTEGER DEFAULT 0,
  created_at TEXT,
  FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS product_discounts (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  product_id INTEGER NOT NULL,
  customer_group TEXT NOT NULL,
  priority INTEGER DEFAULT 0,
  discount_type TEXT DEFAULT 'percent',
  amount REAL NOT NULL,
  currency TEXT DEFAULT 'TRY',
  date_start TEXT,
  date_end TEXT,
  created_at TEXT,
  FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE CASCADE
);


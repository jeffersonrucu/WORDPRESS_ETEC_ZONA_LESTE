import domReady from '@roots/sage/client/dom-ready';

import { Header } from '@scripts/sections/Header';
import { Footer } from '@scripts/sections/Footer';

import { BannerHero } from '@scripts/blocks/BannerHero';

import { ComponentAccessibilityBar } from '@scripts/components/AccessibilityBar';

/**
 * Application entrypoint
 */
domReady(async () => {

  /**
   * Imports scripts from sections
   */
  new Header();
  new Footer();

  /**
   * Imports scripts from blocks
   */
  new BannerHero();

  new ComponentAccessibilityBar()

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

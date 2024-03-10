import domReady from '@roots/sage/client/dom-ready';

import { Header } from '@scripts/sections/Header';
import { Footer } from '@scripts/sections/Footer';

import { BannerHero } from '@scripts/blocks/BannerHero';

import { ComponentAccessibilityBar } from '@scripts/components/AccessibilityBar';
import { RemoveEvent } from '@scripts/commons/RemoveEvent';

/**
 * Application entrypoint
 */
domReady(async () => {

  /**
   * Imports scripts from commons
   */
  new RemoveEvent()

  /**
   * Imports scripts from sections
   */
  new Header();
  new Footer();

  /**
   * Imports scripts from blocks
   */
  new BannerHero();

  /**
   * Imports scripts from components
   */
  new ComponentAccessibilityBar()

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
